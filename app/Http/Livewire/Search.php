<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{ Favorite };

class Search extends Component
{
    public string $searchQuery;
    public $favorites, $cartItemsCount, $recentlyViewed;

    public function searchForQuery()
    {
        return redirect('search?query='.$this->searchQuery);
    }

    public function mount()
    {
        $cartItems = session('user-cart');

        $cartItemsCount = ( $cartItems && is_array($cartItems) ) ? count($cartItems) : 0;

        $favorites = Favorite::where(
            'user_id', auth()->user()->id ?? null
        )->count();
        
        $recentlyViewed = session()->has('recently-viewed')? 
        count( session('recently-viewed') ) : 0;

        $this->fill([ 
            'searchQuery' => '', 'cartItemsCount' => $cartItemsCount, 
            'favorites' => $favorites, 'recentlyViewed' => $recentlyViewed 
        ]);
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
