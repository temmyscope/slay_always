<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\{
  Settings, Favorite, EditProfile, OrderHistory, NewsletterEditor, Scripts,
  Order, Invoice, Notification, Search, NewsletterList,Contact, Announcement,
  Home, AddProduct, ProductsList, Product, Users, Promotions, AddImage, 
};

Route::prefix('admin')->group(function () {

  Route::get('/home', Home::class)->name('index');
  Route::get('/product/add-product', AddProduct::class)->name('productcreate');
  Route::get('/product/list-products', ProductsList::class)->name('list-products');
  Route::get('/add-image/{id}/{type}', AddImage::class)->name('add-image');
  Route::get('/product/{id}', Product::class)->name('product');
  Route::get('/orders', OrderHistory::class)->name('orders');
  Route::get('/announce', Announcement::class)->name('announcement');
  Route::get('/scripts', Scripts::class)->name('scripts');
//  Route::get('/order/{id}', Order::class)->name('order');
  
//this route will be pointed to from orders on completed orders
  Route::get('/invoice/{orderId}', Invoice::class)->name('invoice-template'); 
  Route::get('/promotions/{id?}', Promotions::class)->name('promos');
  Route::get('/feedbacks', Contact::class)->name('contacts');
  Route::get('/settings', Settings::class)->name('settings');

  //if id is passed, the user chat will be in focus
  //Route::get('/chat/{id?}', Chat::class)->name('chat'); scrapped feature

  //options on user cards will be updated to: email, orders, edit icons etc.
  Route::get('users', Users::class)->name('users');
  Route::get('/newsletter/editor/{user?}', NewsletterEditor::class)->name('editor');
  Route::get('/newsletters', NewsletterList::class)->name('newsletters');

});

