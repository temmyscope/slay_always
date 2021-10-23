<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductsList extends Component
{
    public $products = [];
    public $bin = [];
    public bool $binVisibility = false;

    public function delete($id)
    {
        Product::where('id', $id)->update(['deleted' => 'true']);
    }

    public function render()
    {
        $this->products = Product::where('deleted', 'false')->get();
        $this->bin = Product::where('deleted', 'true')->get();
        return view('livewire.admin.products-list', [
            'product' => $this->products, 'bin' => $this->bin
        ])->extends('layouts.admin.master');
    }
}
