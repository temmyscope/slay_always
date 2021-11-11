<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\{
  Settings, Favorite, EditProfile, OrderHistory, NewsletterEditor,
  Order, Invoice, Notification, Search,Contact, Announcement, Scripts,
  Home, AddProduct, ProductsList, Product, Users, Promotions, AddImage, 
};

Route::prefix('admin')->group(function () {

  Route::get('/home', Home::class)->name('index');
  Route::get('/order/{id}', Order::class)->name('order');
  Route::get('/orders', OrderHistory::class)->name('orders');
  Route::get('/product/{id}', Product::class)->name('product');
  Route::get('/scripts/{id?}', Scripts::class)->name('scripts');
  Route::get('/announce', Announcement::class)->name('announcement');
  Route::get('/add-image/{id}/{type}', AddImage::class)->name('add-image');
  Route::get('/product/add-product', AddProduct::class)->name('productcreate');
  Route::get('/product/list-products', ProductsList::class)->name('list-products');
  
 //this route will be pointed to from orders on completed orders
  Route::get('/settings', Settings::class)->name('settings');
  Route::get('/feedbacks', Contact::class)->name('contacts');
  Route::get('/promotions/{id?}', Promotions::class)->name('promos');
  Route::get('/invoice/{orderId}', Invoice::class)->name('invoice-template');

  //if id is passed, the user chat will be in focus; scrapped feature
  //Route::get('/chat/{id?}', Chat::class)->name('chat');

  //options on user cards will be updated to: email, orders, edit icons etc.
  Route::get('users', Users::class)->name('users');
  Route::get('/newsletter/editor/{user?}', NewsletterEditor::class)->name('editor');

});

