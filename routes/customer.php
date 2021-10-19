<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\{
  Cart, Favorite, Recent, Profile, EditProfile, OrderHistory,
  Order, Invoice, Notification, Chat, Search, Rating, Product, Category
};

Route::get('cart', Cart::class)->name('user-cart');

Route::get('rate/{code}', Rating::class)->name('rate-orders');

Route::get('favorites', Favorite::class)->name('user-favorites');

Route::get('recent', Recent::class)->name('user-recent');

Route::get('categories/{category?}', Category::class)->name('categories');

Route::get('search', Search::class)->name('search');

Route::get('product/{id}', Product::class)->name('product');

Route::get('profile/me', Profile::class)->name('user-profile');

Route::get('profile/edit', EditProfile::class)->name('edit-profile');

Route::get('order-history', OrderHistory::class)->name('past-orders');

Route::get('order/{id}', Order::class)->name('order');

Route::get('invoice/{id}', Invoice::class)->name('invoice');

Route::get('notifications', Notification::class)->name('notifications');

Route::get('chat', Chat::class)->name('chat');