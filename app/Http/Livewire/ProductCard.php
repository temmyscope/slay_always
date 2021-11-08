<?php

namespace App\Http\Livewire;

use Livewire\Component;
use StaySlay\Traits\Reusables;
use App\Models\Product;

class ProductCard extends Component
{
    public Product $product;
    public ?float $dicountPercent;
    public $colors;
    public $selectedColor;

    use Reusables;

    public function mount($product, $dicountPercent = null)
    {
        $metadata = json_decode($product->metadata);
        $this->fill([
            'product' => $product, 'dicountPercent' => $dicountPercent,
            'colors' => $metadata->colors, 'selectedColor' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
