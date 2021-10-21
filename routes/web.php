<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Auth };
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Auth\{
    Login, Register, ForgotPassword, ResetPassword, VerifyEmail
};
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', Home::class)->name('welcome');

Route::view('about-us', 'about')->name('faqs');

Route::get('login', Login::class)->name('login');

Route::get('register', Register::class)->name('register');

Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('reset-password/{token}', ResetPassword::class)->name('reset-password');

Route::get('/email/verify', VerifyEmail::class)->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['middleware' => 'auth'], function(){

    Route::get('home', Home::class)->name('welcome');

    @include_once('customer.php');

    Route::middleware([EnsureUserIsAdmin::class])->group(function(){
        @include_once('admin.php');
    });


    Route::get('/logout', function(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    })->name('logout');

});
