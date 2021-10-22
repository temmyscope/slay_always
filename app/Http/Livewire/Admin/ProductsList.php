<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductsList extends Component
{
    public array $products = [];
    public $bin = [];
    public bool $binVisibility = false;

    public function delete($id)
    {
        Product::where('id', $id)->update(['deleted' => 'true']);
    }

    public function mount()
    {
        $this->products = Product::where('deleted', 'false')->get();
        $this->bin = Product::where('deleted', 'true')->get();
    }

    public function render()
    {
        return view('livewire.admin.products-list', [
            'product' => $this->products, 'bin' => $this->bin
        ])->extends('layouts.admin.master');
    }
}