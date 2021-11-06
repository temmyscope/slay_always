<?php

namespace StaySlay\Traits;

use Livewire\WithFileUploads;
use App\Models\{ Cart, Favorite };

trait Reusables{

  use WithFileUploads;

  public $image;
  public $images;

  public function upload(): string
  {
    $this->validate([
      'image' => 'image|max:5096'
    ]); //5MB Max
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
  
  public function addToCart($id, $qty=1)
  {
    $cartItems = session('user-cart') ?? [];
    $cartItems[$id] = $qty;
    session()->put('user-cart', $cartItems);
    $this->emitTo('search', 'incrementCart');
  }

  public function deleteFromCart($id)
  {
    $cartItems = session('user-cart');
    unset($cartItems[$id]);
    session()->put('user-cart', $cartItems);
    $this->emitTo('search', 'decrementCart');
  }

  public function addToFavorite($productId)
  {
    if (!Favorite::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
      $favorite = new Favorite();
      $favorite->user_id = auth()->user()->id;
      $favorite->product_id = $productId;
      $favorite->save();
      $this->emitTo('search', 'incrementFavorite');
    }else{
      Favorite::where('user_id', auth()->user()->id)->where('product_id', $productId)->delete();
      $this->emitTo('search', 'decrementFavorite');
    }
  }
  
}