<?php

namespace StaySlay\Traits;

use Livewire\WithFileUploads;
use App\Models\{ Cart as CartModel, Favorite };
use Illuminate\Support\Facades\Auth;

trait Reusables{

  use WithFileUploads;

  public $image;
  public $images;

  public function upload(): string
  {
    $this->validate([
      'image' => 'image|max:5096'
    ]);
    return $this->image->store('images');
  }

  public function uploadMany(): array
  {
    $this->validate([
      'images.*' => 'image|max:5096'
    ]); //5MB Max
    $arrayOfPaths = [];
    foreach ($this->images as $image) {
      $arrayOfPaths[] = $image->store('images');
    }
    return $arrayOfPaths;
  }

  public function fetchCart()
  {
    if (Auth::check()) {
      //decode  json encoded cart, get array keys and return count if not empty
      $cart = CartModel::where('user_id', auth()->user()->id)->first();
      if (empty($cart)) {
        return session('user-cart');
      }
      return json_decode($cart->items, true);
    }else{
      return session('user-cart');
    }
  }

  public function cartCount()
  {
    if (Auth::check()) {
      $cartItems = CartModel::where('user_id', auth()->user()->id)->first();
      return ($cartItems)? count(array_keys(json_decode($cartItems->items, true))) : 0;
    }else{
      $cartItems = session('user-cart');
      return ( $cartItems && is_array($cartItems) )? count(array_keys($cartItems)) : 0;
    }
  }
  
  public function addToCart($id, $qty=1)
  {
    if (Auth::check()) {
      if (CartModel::where('user_id', auth()->user()->id)->exists()) {
        CartModel::where('user_id', auth()->user()->id)->update(["items->$id" => $qty]);
      }else{
        $cart = new CartModel(); $cart->user_id = auth()->user()->id;
        $cart->items = json_encode([$id => $qty]); $cart->save();
      }
    }else{
      $cartItems = session('user-cart') ?? [];
      $cartItems[$id] = $qty;
      session()->put('user-cart', $cartItems);
    }
    $this->emitTo('search', 'refreshCartCount');
  }

  public function deleteFromCart($id)
  {
    if (Auth::check()) {
      $cart = CartModel::where('user_id', auth()->user()->id)->first();
      $user_cart = json_decode($cart->items, true);
      unset($user_cart[$id]);
      $cart->items = json_encode($user_cart);
      $cart->save();
    }else{
      $cartItems = session('user-cart');
      unset($cartItems[$id]);
      session()->put('user-cart', $cartItems);
    }
    $this->emitTo('search', 'refreshCartCount');
  }

  public function addToFavorite($productId)
  {
    if (!Favorite::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
      $favorite = new Favorite();
      $favorite->user_id = auth()->user()->id;
      $favorite->product_id = $productId;
      $favorite->save();
      $this->emitTo('search', 'refreshFavoriteCount');
    }else{
      Favorite::where('user_id', auth()->user()->id)->where('product_id', $productId)->delete();
      $this->emitTo('search', 'refreshFavoriteCount');
    }
  }

  public function clearCart()
  {
    if (Auth::check()) {
      CartModel::where('user_id', auth()->user()->id)->delete();
    }else{
      if (session()->has('user-cart')) {
        session()->remove('user-cart');
      }
    }
    $this->emitTo('search', 'refreshCartCount');
  }
  
}