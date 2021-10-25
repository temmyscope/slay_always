<?php

namespace App\Http\Livewire;

use Livewire\Component;
use StaySlay\Traits\Reusables;
use App\Models\Product;

class ProductCard extends Component
{
    public Product $product;
    public float $dicountPercent;

    use Reusables;

    public function mount()//$product, $dicountPercent = null)
    {
        $this->fill([
            //'product' => $product, 'dicountPercent' => $dicountPercent ?? 0
        ]);
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
