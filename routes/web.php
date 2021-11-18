<?php

use Illuminate\Http\Request;
use App\Http\Livewire\Pages\Home;
use Illuminate\Support\Facades\{ Auth };
use Illuminate\Support\Facades\{ Route, DB };
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Livewire\Auth\{
    Login, Register, ForgotPassword, ResetPassword, VerifyEmail
};
use App\Http\Livewire\Pages\{
    Cart, Recent, Search, Product, AboutUs
};
use App\Notifications\OrderCompleted;
use App\Models\Order;

Route::get('/', Home::class)->name('welcome')->middleware('guest');

Route::get('about-us', AboutUs::class)->name('about-us');

//Route::view('terms', 'terms')->name('terms');

Route::view('privacy', 'privacy-policy')->name('privacy');

Route::get('login', Login::class)->name('login')->middleware('guest');

Route::get('register', Register::class)->name('register')->middleware('guest');

Route::get('forgot-password', ForgotPassword::class)->name('forgot-password')->middleware('guest');

Route::get('reset-password/{token}', ResetPassword::class)->name('reset-password')->middleware('guest');

Route::get('/email/verify', VerifyEmail::class)->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request, $id, $hash) {

    $request->fulfill();

    $profile = new \App\Models\Profile();
    $profile->user_id = auth()->user()->id;
    if ( is_numeric($profile->user_id) ) {
        $profile->save();
    }

    return redirect('/home');

})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('cart', Cart::class)->name('user-cart');

Route::get('recent', Recent::class)->name('user-recent');

Route::get('category/{category}', Search::class)->name('category');

Route::get('search', Search::class)->name('search');

Route::get('product/{id}', Product::class)->name('user-product');

Route::group(['middleware' => 'auth'], function(){

    Route::get('home', Home::class)->name('home');

    @include_once('customer.php');

    Route::middleware([EnsureUserIsAdmin::class])->group(function(){
        @include_once('admin.php');
    });

    Route::get('/logout', function(Request $request){

        Auth::logout();

        //$request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    })->name('logout');

});

Route::post('api/paystack/webhook', function (Request $request) {
    $input = @file_get_contents("php://input");
    if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, env('PAYSTACK_SECRET_KEY'))){
        exit();
    }
    response()->json(['status' => 200]);
    DB::table('transaction_logs')->insert(['log' => $input]);
    return response()->json(['status' => 200 ]);
});

Route::get('api/transaction/verify/{ref}/{user_id}', function (Request $request, $ref, $user_id) {
    $response = paystackVerifyPayment($ref);
    if ( isset($response['data']['status']) && strtolower($response['data']['status']) === 'success' ){
        $order = Order::where('txn_id', $ref)->where('user_id', $ref)->first();
        if ($order) {
            $user = User::find($user_id);
            if ($user) {
                $user->notify(new OrderCompleted($order));
            }
            Order::where('id', $order->id)->update([
                'status' => 'completed', 'metadata->paymentData' => json_encode($response)
            ]);
            if (strtolower($response['data']['channel']) === 'card') {
                DB::table('profile')->where('user_id', $user_id)->update([
                    'paystack_token' => $response['authorization']['authorization_code']
                ]);
            }
        }
    }
    redirect()->route('order-history');
});
