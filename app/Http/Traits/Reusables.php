<?php

namespace StaySlay\Traits;

use Livewire\WithFileUploads;
use App\Models\{ Cart, Favorite };

trait Reusables{

  use WithFileUploads;

  public $image;

  public function upload(): string
  {
    $this->validate(['photo' => 'image|max:5096']);//5MB Max
    return $this->image->store('photos');
  }
  
  public function addToCart($id, $qty=1)
  {
    $cartItems = session('user-cart');
    if ( $cartItems && is_array($cartItems) ) {
      $cartItems[$id] = $qty;
    }else{
      $cartItems =  [ $id => $qty ];
    }
    session()->put('user-cart', $cartItems);
  }

  public function deleteFromCart($id)
  {
      $cartItems = session('user-cart');
      foreach ($cartItems as $product => $qty) {
          if($id === $product ){
              unset($cartItems[$product]);
              break;
          }
      }
      session()->put('user-cart', $cartItems);
  }

  public function addToFavorite($productId)
  {
    if (!Favorite::where([ 'user_id' => auth()->user()->id, 'product_id' => $productId ])->exists()) {
      Favorite::insert([
        'user_id' => auth()->user()->id, 'product_id' => $productId
      ]);
    }
  }

  public function deleteFromFavorite($id)
  {
    FavoriteModel::where('product_id', $id)->where('user_id', auth()->user()->id)->delete();
  }
  
}