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
    protected $tagOptions, $colorOptions, $sizeOptions;

    public function save()
    {
        $this->validate([
            'product' => 'required|min:6',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'tags' => "required",
        ]);

        $sizes = array_map('trim', explode(',', $this->sizes));
        $colors = array_map('trim', explode(',', $this->colors));
        
        $product = New ProductModel();
        $product->user_id = auth()->user()->id;
        $product->name = ucfirst(strtolower($this->product));
        $product->description = $this->desc;
        $product->price = (float)$this->price;
        $product->quantity = (int)$this->qty;
        $product->tags = $this->tags;
        $product->metadata = json_encode([ 
            'colors' => empty($this->colors) ? $this->colorOptions : $colors, 
            'sizes' => empty($this->sizes) ? $this->sizeOptions : $sizes, 
        ]);
        if ($product->save()) {
            redirect()->route('list-products');
        }
    }

    public function mount()
    {
        $tags = DB::table('metadata')->whereNotNull('meta->categories')->first();
        $colors = DB::table('metadata')->whereNotNull('meta->colors')->first();
        $sizes = DB::table('metadata')->whereNotNull('meta->sizes')->first();

        $this->fill([
            'product' => null, 'desc' => null, 'price' => null,
            'tags' => '', 'colors' => '', 'sizes' => '', 'qty' => null,
            'tagOptions' => $tags ? explode(',', json_decode($tags->meta)->categories) : [], 
            'colorOptions' => $colors ? explode(',', json_decode($colors->meta)->colors) : [], 
            'sizeOptions' => $sizes ? explode(',', json_decode($sizes->meta)->sizes) : []
        ]);
    }

    public function render()
    {
        return view('livewire.admin.add-product', [
            'tagOptions' => $this->tagOptions, 
            'colorOptions' => $this->colorOptions, 
            'sizeOptions' => $this->sizeOptions,
        ])->extends('layouts.admin.master')->section('content');
    }
}
