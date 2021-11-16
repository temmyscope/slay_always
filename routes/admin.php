<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\{
  Settings, Favorite, EditProfile, OrderHistory, NewsletterEditor,
  Order, Invoice, Notification, Search,Contact, Announcement, Scripts, Home, 
  AddProduct, ProductsList, Product, Users, Promotions, AddImage, AddInstagram
};

Route::prefix('admin')->group(function () {

  Route::get('/home', Home::class)->name('index');
  Route::get('/order/{id}', Order::class)->name('admin-order');
  Route::get('/orders', OrderHistory::class)->name('orders');
  Route::get('/product/{id}', Product::class)->name('product');
  Route::get('/scripts/{id?}', Scripts::class)->name('scripts');
  Route::get('/announce', Announcement::class)->name('announcement');
  Route::get('/add-product', AddProduct::class)->name('productcreate');
  Route::get('/add-image/{id}/{type}', AddImage::class)->name('add-image');
  Route::get('/list-products', ProductsList::class)->name('list-products');
  
 //this route will be pointed to from orders on completed orders
  Route::get('/settings', Settings::class)->name('admin-settings');
  Route::get('/feedbacks', Contact::class)->name('admin-contact');
  Route::get('/add-gram/{id?}', AddInstagram::class)->name('add-instagram');
  Route::get('/promotions/{id?}', Promotions::class)->name('promos');
  Route::get('/invoice/{orderId}', Invoice::class)->name('invoice-template');

  //if id is passed, the user chat will be in focus; scrapped feature
  //Route::get('/chat/{id?}', Chat::class)->name('chat');

  //options on user cards will be updated to: email, orders, edit icons etc.
  Route::get('users', Users::class)->name('users');
  Route::get('/newsletter/editor/{user?}', NewsletterEditor::class)->name('editor');

});

