<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB , Route};
use App\Models\{ Favorite };

class Search extends Component
{
    public string $searchQuery;
    public $favorites, $cartItemsCount;
    protected $listeners = ['incrementCart', 'decrementCart', 'incrementFavorite', 'decrementFavorite'];

    public function decrementCart()
    {
        $this->cartItemsCount = $this->cartItemsCount - 1;
    }
    public function incrementCart()
    {
        $this->cartItemsCount = $this->cartItemsCount + 1;
    }
    public function incrementFavorite()
    {
        $this->favorites = Favorite::where('user_id', auth()->user()->id)->count();
    }
    public function decrementFavorite()
    {
        $this->favorites = $this->favorites - 1;
    }

    public function searchForQuery()
    {
        //$this->emitTo('pages.search', 'searchOnPage', $this->searchQuery); works
        return redirect('search?query='.$this->searchQuery);
    }

    public function mount()
    {
        $cartItems = session('user-cart');

        $cartItemsCount = ( $cartItems && is_array($cartItems) )? 
        count(array_keys($cartItems)) : 0;

        $favorites = Favorite::where(
            'user_id', auth()->user()->id ?? null
        )->count();
        
        $notes = DB::table('notes')->where('active_at', '>', date('Y-m-d h:i:s'))->get();

        $this->fill([ 
            'searchQuery' => '', 'cartItemsCount' => $cartItemsCount, 
            'favorites' => $favorites, 'notes' => $notes 
        ]);
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
