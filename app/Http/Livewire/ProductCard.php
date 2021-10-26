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
        //$metadata = json_decode($product->metadata);
        $this->fill([
            //'product' => $product, 'dicountPercent' => $dicountPercent ?? 0,
            //'color' => $metadata->colors,
        ]);
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
