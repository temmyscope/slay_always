<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\{
  Cart, Favorite, Recent, Profile, EditProfile, OrderHistory,
  Order, Invoice, Notification, Chat, Search,
};

Route::get('cart', Cart::class);

Route::get('favorites', Favorite::class);

Route::get('recent', Recent::class);

Route::get('profile/me', Profile::class);

Route::get('profile/edit', EditProfile::class);

Route::get('order-history', OrderHistory::class);

Route::get('order/{id}', Order::class);

Route::get('invoice/{id}', Invoice::class);

Route::get('notifications', Notification::class);

Route::get('chat', Chat::class);