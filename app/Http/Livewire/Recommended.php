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
        $value = Cache::remember('users', $seconds=259200, function () {
            return DB::table('users')->get();
        });
        $cart = $this->fetchCart();
        $recent = session('recently-viewed');
        Product::whereIn('id', );
        //$recommended = 
        $this->fill([
            'products' => Product::whereIn('id', )
        ]);
    }

    public function render()
    {
        return view('livewire.recommended');
    }
}
