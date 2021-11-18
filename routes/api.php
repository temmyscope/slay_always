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
  response()->json(['status' => 200]);
  DB::table('transaction_logs')->insert([ 'log' => $input ]);
  return response()->json([ 'status' => 200 ]);

})->middleware(['api']);