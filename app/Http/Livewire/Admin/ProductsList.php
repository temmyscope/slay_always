<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ProductsList extends Component
{
    
    public array $product = [];


    public function mount()
    {
        $products = Product::all();
    }

    public function render()
    {
        return view('livewire.admin.products-list', ['product' => $this->products ])->extends('layouts.admin.master');
    }
}
