<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Auth\{
    Login, Register, ForgotPassword, ResetPassword
};

Route::get('/', Home::class)->name('welcome');

Route::view('faqs', 'faqs')->name('faqs');

Route::view('about-us', 'about')->name('faqs');

Route::get('login', Login::class)->name('login');

Route::get('register', Register::class)->name('register');

Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('reset-password/{token}', ResetPassword::class)->name('reset-password');

//Route::group(['middleware' => 'auth'], function(){

    @include_once('customer.php');

    //Route::middleware([EnsureUserIsAdmin::class])->group(function(){
        @include_once('admin.php');
    //});

    /*
    Route::get('/logout', function(Request $request){
        Auth::logout();
        return redirect('/');
    })->name('logout');
    */
//});
