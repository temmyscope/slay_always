<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB , Route};
use App\Models\{ Favorite };

class Search extends Component
{

    public string $searchQuery;
    public $favorites, $cartItemsCount, $recentlyViewed;
    protected $listeners = ['incrementRecent'];

    public function incrementRecent()
    {
        $this->recentlyViewed = $this->recentlyViewed + 1;
    }

    public function searchForQuery()
    {
        if ( str_contains(Route::current()->getName(), env('APP_URL').'/search') ) {
            $this->emitTo('pages.search', 'searchOnPage', $this->searchQuery);
        }else{
            return redirect('search?query='.$this->searchQuery);
        }
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
        
        $notes = DB::table('notes')->where('active_at', '>', date('Y-m-d h:i:s'))->get();


        $this->fill([ 
            'searchQuery' => '', 'cartItemsCount' => $cartItemsCount, 
            'favorites' => $favorites, 'recentlyViewed' => $recentlyViewed,
            'notes' => $notes 
        ]);
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
