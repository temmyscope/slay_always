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
            
            $priceRangeOne = $dataPool->avg('price');
            $categories = "";
            if (empty($dataPool)) {
                return [];
            }
            
            $dataPool->each(
                function($item, $key) use(&$categories){
                    $categories .= $item->tags;
                }
            );
            $priceRange = [ $priceRangeOne, $priceRangeOne*2 ];

            return Product::recommend('price', $priceRange, $categories);
        });
        $this->fill([ 'products' => $recommendations ]);
    }

    public function render()
    {
        return view('livewire.recommended');
    }
}
