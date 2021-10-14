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

Route::prefix('api')->post('/webhook', function (Request $request) {
    //where webhook loads to
    //DB::table('orders')->where('')
    return;
});

Route::prefix('api')->post('/transaction/verify', function (Request $request) {
    $response = paystackVerifyPayment($request->input('reference'));
    if ( isset($response['data']['status']) && strtolower($response['data']['status']) === 'success' ){
        DB::table('orders')->where('')->update([
            'status' => 'completed', 'metadata' => json_encode($response)
        ]);
        if (strtolower($response['data']['channel']) === 'card') {
            $response['authorization']['authorization_code'];
        }
        return response()->json(['status' => 200, 'data' => $response ]);
    }
    return;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});