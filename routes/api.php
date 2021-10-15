<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Route, DB };
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('api')->post('/paystack/webhook', function (Request $request) {
    $input = @file_get_contents("php://input");
    if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, env('PAYSTACK_SECRET_KEY'))){
        exit();
    }
    DB::table('transaction_logs')->insert(['log' => $input]);
    return response()->json(['status' => 200]);
});

Route::prefix('api')->get('/transaction/verify/{ref}/{user_id}', function (Request $request, $ref, $user_id) {
    $response = paystackVerifyPayment($ref);
    if ( isset($response['data']['status']) && strtolower($response['data']['status']) === 'success' ){
        DB::table('orders')->where([[ 'txn_id', $ref ], [ 'user_id', $ref ]])->update([
            'status' => 'completed', 'metadata->paymentData' => json_encode($response)
        ]);
        if (strtolower($response['data']['channel']) === 'card') {
            DB::table('profile')->where('user_id', $user_id)->update([
                'paystack_token' => $response['authorization']['authorization_code']
            ]);
        }
        return response()->json([ 'status' => 200, 'data' => $response ]);
    }
    return;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});