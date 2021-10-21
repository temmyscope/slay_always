<?php

namespace App\Http\Livewire\Traits;

use Livewire\WithFileUploads;

trait Reusables{

  use WithFileUploads;

  public $image;

  public function upload(): string
  {
    $this->validate(['photo' => 'image|max:5096']);//5MB Max
    return $this->image->store('photos');
  }

  public function addToCart()
  {
    
  }

  public function addToFavorite()
  {
    
  }
  
}