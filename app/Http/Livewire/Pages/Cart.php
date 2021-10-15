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
        if(!session()->has('visited')){
            session('visited', true);
            DB::table('metadata')->where('id', 1)->increment('meta->visits');
        }
    }

    public function render()
    {
        return view('livewire.pages.cart', [
            'cart' => UserCart::where([
                'user_id' => auth()->user(), 'status' => 'active'
            ])->first()
        ]);
    }
}