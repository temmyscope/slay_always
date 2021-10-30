<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductsList extends Component
{
    public bool $binVisibility = false;

    public function delete($id)
    {
        Product::where('id', $id)->update(['deleted' => 'true']);
    }

    public function render()
    {
        return view('livewire.admin.products-list', [
            'products' => Product::where('deleted', 'false')->get(), 
            'bin' => Product::with('images')->where('deleted', 'true')->get()
        ])->extends('layouts.admin.master')->section('content');
    }
}
