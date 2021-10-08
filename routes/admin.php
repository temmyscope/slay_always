<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\{
  Cart, Favorite, UserProfile, EditProfile, OrderHistory, NewsletterEditor,
  Order, Invoice, InvoicesList, Notification, Chat, Search, NewsletterList,
  Home, AddProduct, ProductsList, Product, Users, BlogEditor, BlogPosts, EmailCompose
};

Route::prefix('admin')->group(function () {

  Route::get('/home', Home::class)->name('index');
  Route::get('/product/add-product', AddProduct::class)->name('productcreate');
  Route::get('/product/list-products', ProductsList::class)->name('list-products');
  Route::get('/orders', OrderHistory::class)->name('orders');
  Route::get('/order/{id}', Order::class)->name('order');
  Route::get('/list-invoice', AddProduct::class)->name('list-invoice');
  Route::get('/email-compose', EmailCompose::class)->name('email-compose');
  Route::get('/invoice/{orderId}', Invoice::class)->name('invoice-template');
  Route::get('/chat', Chat::class)->name('chat');

  //options on user cards will be updated to: email, cart, edit icons etc.
  Route::get('users', Users::class)->name('users');
  Route::get('users/cart/{user}', Cart::class)->name('cart');//view content of users cart
  Route::get('users/edit-profile/{id}', UserProfile::class)->name('edit-profile');

  Route::get('/editor', NewsletterEditor::class)->name('editor');
  Route::get('/newsletter/editor', NewsletterEditor::class)->name('newsletter-editor');
  Route::get('/newsletters', NewsletterList::class)->name('newsletters');

  Route::get('/blog/posts', BlogPosts::class)->name('blog');
  //Route::view('blog/{id}', 'Blog::class)->name('blog-single');
  Route::get('/blog/editor', BlogEditor::class)->name('add-post');

});

