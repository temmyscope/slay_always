<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Livewire\Pages\Home;

Route::get('/', Home::class)->name('welcome');

Route::get('/faqs', fn () => view('faqs'))->name('faqs');

Route::get('/about-us', fn () => view('faqs'))->name('faqs');

Route::get('/login', fn () => view('auth.login'))->name('login');

Route::get('/register', fn () => view('auth.register'))->name('register');

Route::get('/forgot-password', fn () => view('auth.forgot-password'))->name('forgot-password');

Route::get('/reset-password/{token}', fn() => view('auth.reset-password', [
    'token' => $token 
]))->name('password.reset');

Route::group(['middleware' => 'auth'], function(){

    @include_once('customer.php');
    
    Route::middleware([EnsureUserIsAdmin::class])->group(function () {
        @include_once('admin.php');
    });

    Route::get('/logout', function(Request $request){
        Auth::logout();
        return redirect('/');
    })->name('logout');

});
