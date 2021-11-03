<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\{
  Cart, Favorite, Recent, Profile, EditProfile, OrderHistory,
  Invoice, Notification, Search, Rating, Product, Checkout, Order
};

Route::get('cart', Cart::class)->name('user-cart');

Route::get('rate/{code}', Rating::class)->name('rate-orders');

Route::get('favorites', Favorite::class)->name('user-favorites');

Route::get('recent', Recent::class)->name('user-recent');

Route::get('category/{category}', Search::class)->name('category');

Route::get('search', Search::class)->name('search');

Route::get('product/{id}', Product::class)->name('product');

Route::get('profile/me', Profile::class)->name('user-profile')->middleware('verified');

Route::get('profile/edit', EditProfile::class)->name('edit-profile')->middleware('verified');

Route::get('order-history', OrderHistory::class)->name('order-history')->middleware('verified');

Route::get('order/{id}', Order::class)->name('each-order');

Route::get('checkout/{id}', Checkout::class)->name('checkout');

Route::get('invoice/{txn_id}', Invoice::class)->name('invoice');

Route::get('notifications', Notification::class)->name('notifications');