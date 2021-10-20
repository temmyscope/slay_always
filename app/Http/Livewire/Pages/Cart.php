<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use App\Models\Cart as UserCart;
use Illuminate\Support\Facades\{ DB };

class Cart extends Component
{
    protected $cart = [];

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.pages.cart', [
            'cart' => UserCart::where([
                'user_id' => auth()->user(), 'ordered' => 'false'
            ])->first()
        ])->extends('layouts.app');
    }
}
