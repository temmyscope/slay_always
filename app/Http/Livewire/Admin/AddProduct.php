<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component, WithFileUploads};
use App\Models\{Product as ProductModel, Image };
use Illuminate\Support\Facades\{ DB };

class AddProduct extends Component
{
    public $product;
    public $desc;
    public $qty;
    public $price;
    public $tags, $colors, $sizes;

    public function save()
    {
        $this->validate([
            'product' => 'required|min:6',
            'desc' => 'required|string',
            'price' => 'required|numeric'
        ]);
        
        $product = New ProductModel();
        $product->name = $this->product;
        $product->description = $this->desc;
        $product->price = (float)$this->price;
        $product->quantity = (int)$this->qty;
        $product->tags = implode(', ', $this->tags);
        $product->metadata = json_encode([ 'colors' => $this->colors, 'sizes' => $this->sizes ]);
        $product->save();
    }

    public function mount()
    {
        $this->fill([
            'product' => null, 'desc' => null, 'price' => null,
            'tags' => [], 'colors' => [], 'sizes' => [], 'qty' => null
        ]);
    }

    public function render()
    {
        $tags = DB::table('metadata')->whereNotNull('meta->categories')->first();
        $colors = DB::table('metadata')->whereNotNull('meta->colors')->first();
        $sizes = DB::table('metadata')->whereNotNull('meta->sizes')->first();
        
        return view('livewire.admin.add-product', [
            'tagOptions' => $tags ? explode(',', json_decode($tags->meta)->categories) : [], 
            'colorOptions' => $colors ? explode(',', json_decode($colors->meta)->colors) : [], 
            'sizeOptions' => $sizes ? explode(',', json_decode($sizes->meta)->sizes) : []
        ])->extends('layouts.admin.master')->section('content');
    }
}
