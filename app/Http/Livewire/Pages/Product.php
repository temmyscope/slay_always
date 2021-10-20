<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public int $productId;
    protected $product;

    public function mount($id)
    {
        $this->productId = (int) $id;
        $this->product = ProductModel::find($this->productId);
    }

    public function render()
    {
        return view('livewire.pages.product', [
            'product' => $this->product
        ])->extends('layouts.app');
    }
}
