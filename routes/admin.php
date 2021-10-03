<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
  
  Route::prefix('dashboard')->group(function () {
    Route::view('/', 'admin.dashboard.default')->name('index');
    Route::view('dashboard-02', 'admin.dashboard.dashboard-02')->name('dashboard-02');
  });
  
  //modify to use as product upload
  Route::view('projectcreate', 'admin.apps.project.projectcreate')->name('projectcreate');
  
  Route::view('list-products', 'admin.apps.ecommerce.list-products')->name('list-products');
  
  //for users to download invoice
  Route::view('invoice-template', 'admin.apps.ecommerce.invoice-template')->name('invoice-template');
  
  //to view each order
  Route::view('order-history', 'admin.apps.ecommerce.order-history')->name('order-history');
  
  Route::prefix('email')->group( function(){
    //to send emails to individuals and multiple users; especially newletters
    Route::view('email_compose', 'admin.apps.email_compose')->name('email_compose');
  });

  Route::view('chat', 'admin.apps.chat')->name('chat');
  
  Route::prefix('users')->group( function(){
    Route::view('cart/{user}', 'admin.apps.ecommerce.cart')->name('cart');//view content of users cart
    Route::view('edit-profile/{id}', 'admin.apps.edit-profile')->name('edit-profile');
    Route::view('user-cards', 'admin.apps.user-cards')->name('user-cards');
    //options on user cards will be updated to: email, cart, edit icons etc.
  });
  
  //modify to list all newsletters and push messages send out
  Route::view('task', 'admin.apps.task')->name('task');
  
  Route::view('calendar-basic', 'admin.apps.calendar-basic')->name('calendar-basic');
  
  Route::view('error-page1', 'admin.errors.error-page1')->name('error-page1');
  
  Route::view('comingsoon', 'admin.comingsoon.comingsoon')->name('comingsoon');
  /*
  Route::view('basic-template', 'admin.email.basic-template')->name('basic-template');
  Route::view('email-header', 'admin.email.email-header')->name('email-header');
  Route::view('template-email', 'admin.email.template-email')->name('template-email');
  Route::view('template-email-2', 'admin.email.template-email-2')->name('template-email-2');
  Route::view('ecommerce-templates', 'admin.email.ecommerce-templates')->name('ecommerce-templates');
  Route::view('email-order-success', 'admin.email.email-order-success')->name('email-order-success');
  */
  
  Route::prefix('blog')->group( function(){
    Route::view('/', 'admin.miscellaneous.blog')->name('blog');
    Route::view('blog-single', 'admin.miscellaneous.blog-single')->name('blog-single');
    Route::view('add-post', 'admin.miscellaneous.add-post')->name('add-post');
  });
  
  Route::view('faq', 'admin.miscellaneous.faq')->name('faq');

  //view('/editor', 'admin.miscellaneous.simple-MDE')
  
});
