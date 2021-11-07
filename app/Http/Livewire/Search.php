<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB , Route};
use App\Models\{ Favorite };
use StaySlay\Traits\{ Reusables };

class Search extends Component
{
    use Reusables;

    public string $searchQuery;
    public $favorites, $cartItemsCount;
    protected $listeners = ['refreshCartCount', 'refreshFavoriteCount'];

    public function refreshCartCount()
    {
        $this->cartItemsCount = $this->cartCount();
    }
    public function refreshFavoriteCount()
    {
        $this->favorites = Favorite::where('user_id', auth()->user()->id)->count()+1;
    }

    public function searchForQuery()
    {
        //$this->emitTo('pages.search', 'searchOnPage', $this->searchQuery); works
        return redirect('search?query='.$this->searchQuery);
    }

    public function mount()
    {
        $cartItemsCount = $this->cartCount();

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
