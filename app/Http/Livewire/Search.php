<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB , Route};
use App\Models\{ Favorite, Product };
use StaySlay\Traits\{ Reusables };
use Illuminate\Support\Facades\Cache;

class Search extends Component
{
    use Reusables;

    public string $searchQuery;
    public $navCategories;
    public $notes, $favorites, $cartItemsCount;
    protected $listeners = ['refreshCartCount', 'refreshFavoriteCount'];

    public function refreshCartCount()
    {
        $this->cartItemsCount = $this->cartCount();
    }

    public function refreshFavoriteCount()
    {
        $this->favorites = Favorite::where('user_id', auth()->user()->id)->count();
    }

    public function searchForQuery()
    {
        //$this->emitTo('pages.search', 'searchOnPage', $this->searchQuery);
        return redirect('search?query='.$this->searchQuery);
    }
    
    public function getCategories()
    {
        //Cache::forget('categories');
        $tags = Cache::rememberForever('categories', function(){
            $tags = Product::where(
                'deleted', 'false'
            )->inRandomOrder()->take(12)->pluck('tags');
            $newTags = [];
            foreach($tags as $index => $tag){
                $splitTags = explode(',', $tag);
                $splitTags = array_map(
                    fn($str) => trim(strtolower($str)), $splitTags
                );
                $newTags = array_merge($newTags, $splitTags);
            }
            $newTags = array_slice(array_values($newTags), 0, 15);
            $newTags = array_unique(array_filter($newTags));
            return $newTags;
        });
        return $tags;
    }

    public function mount()
    {
        $cartItemsCount = $this->cartCount();

        $favorites = Favorite::where(
            'user_id', auth()->user()?->id ?? null
        )->count();
        
        $notes = DB::table('notes')->where(
            'active_at', '>', date('Y-m-d h:i:s')
        )->get();

        $this->fill([ 
            'searchQuery' => '', 'cartItemsCount' => $cartItemsCount, 
            'favorites' => $favorites, 'notes' => $notes,
            'navCategories' => $this->getCategories()
        ]);
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
