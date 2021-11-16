<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductsList extends Component
{
    public bool $binVisibility;

    public function delete($id)
    {
        Product::where('id', $id)->update(['deleted' => 'true']);
    }
    public function restore($id)
    {
        Product::where('id', $id)->update(['deleted' => 'false']);
    }

    public function flush($id)
    {
        Product::where('id', $id)->delete();
    }

    public function switchVisibility()
    {
        $this->binVisibility = !$this->binVisibility;
    }

    public function mount()
    {
        $this->fill([
            'binVisibility' => false
        ]);
    }

    public function render()
    {
        return view('livewire.admin.products-list', [
            'products' => Product::where('deleted', 'false')->get(), 
            'bin' => Product::with('images')->where('deleted', 'true')->get()
        ])->extends('layouts.admin.master')->section('content');
    }
}
