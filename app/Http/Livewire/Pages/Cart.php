<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use App\Models\Cart as UserCart;

class Cart extends Component
{
    protected $cart = [];

    public function mount()
    {
        $this->cart = UserCart::where([
            'user_id' => auth()->user(), 'status' => 'active'
        ])->first();
    }

    public function render()
    {
        return view('livewire.pages.cart');
    }
}
