<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\{
  Cart, Favorite, Recent, Profile, EditProfile, OrderHistory, Review, ChangePassword,
  Invoice, Notification, Search, Product, Order, EditAddress, PendingReview
};

Route::get('favorites', Favorite::class)->name('user-favorites');

Route::get('profile/change-password', ChangePassword::class)->name('change-password');

Route::get('profile/me', Profile::class)->name('user-profile');//->middleware('verified');

Route::get('profile/edit', EditProfile::class)->name('edit-profile');//->middleware('verified');

Route::get('profile/edit-address', EditAddress::class)->name('edit-address');//->middleware('verified');

Route::get('order-history', OrderHistory::class)->name('order-history');//->middleware('verified');

Route::get('order/{id}', Order::class)->name('each-order');

Route::get('review/{id}', Review::class)->name('review-product');

Route::get('pending-reviews', PendingReview::class)->name('pending-reviews');

//Route::get('invoice/{txn_id}', Invoice::class)->name('invoice');

Route::get('notifications', Notification::class)->name('notifications');