<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;

class Product extends Component
{
    public int $productId;
    protected $product;

    public function mount(Request $request, $id)
    {
        $this->productId = (int) $id;
        $this->product = ProductModel::find($this->productId);
        
        if ($request->session()->exists("recently-viewed")) {
            $request->session()->push('recently-viewed', $id);
        }else{
            $request->session->put('recently-viewed', [ $id ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.product', [
            'product' => $this->product
        ])->extends('layouts.app')->section('content');
    }
}
