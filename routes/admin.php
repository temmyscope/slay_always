<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\{
  Settings, Favorite, EditProfile, OrderHistory, NewsletterEditor,
  Order, Invoice, Notification, Chat, Search, NewsletterList,Contact,
  Home, AddProduct, ProductsList, Product, Users, BlogEditor, BlogPosts, Promotions, 
};

Route::prefix('admin')->group(function () {

  Route::get('/home', Home::class)->name('index');
  Route::get('/product/add-product', AddProduct::class)->name('productcreate');
  Route::get('/product/list-products', ProductsList::class)->name('list-products');
  Route::get('/orders', OrderHistory::class)->name('orders');
  Route::get('/order/{id}', Order::class)->name('order');
  //this route will be pointed to from orders on completed orders
  Route::get('/invoice/{orderId}', Invoice::class)->name('invoice-template');
  Route::get('/chat/{id?}', Chat::class)->name('chat'); //if id is passed, the user chat will be in focus
  Route::get('/promotions/{id?}', Promotions::class)->name('promos');
  Route::get('/feedbacks', Contact::class)->name('contacts');
  Route::get('/settings', Settings::class)->name('settings');

  //options on user cards will be updated to: email, orders, edit icons etc.
  Route::get('users', Users::class)->name('users');

  Route::get('/newsletter/editor/{user?}', NewsletterEditor::class)->name('editor');
  Route::get('/newsletters', NewsletterList::class)->name('newsletters');

  Route::get('/blog/posts', BlogPosts::class)->name('blog');
  //Route::view('blog/{id}', 'Blog::class)->name('blog-single');
  Route::get('/blog/editor', BlogEditor::class)->name('add-post');

});

