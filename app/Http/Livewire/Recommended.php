<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{ Product };
use StaySlay\Traits\{ Reusables };
use Illuminate\Support\Facades\Cache;

class Recommended extends Component
{
    public $products;

    use Reusables;

    public function mount()
    {
        //cache is valid for 3 days
        $recommendations = Cache::remember('recommendations', $seconds=259200, function () {
            $cart = $this->fetchCart();
            $recent = session('recently-viewed');

            $pool = array_merge($cart ?? [], $recent ?? []);
            $poolIds = array_keys($pool);
            $dataPool = Product::whereIn('id', $poolIds)->get();
            
            $priceRange = [];
            $categories = "";
            
            $dataPool->each(
                function($item, $key) use(&$priceRange, &$categories){
                    array_push($priceRange, $item->price);
                    $categories .= $item->tags;
                }
            );
            sort($priceRange);

            return Product::recommend('price', $priceRange, $categories);
        });
        $this->fill([ 'products' => $recommendations ]);
    }

    public function render()
    {
        return view('livewire.recommended');
    }
}
