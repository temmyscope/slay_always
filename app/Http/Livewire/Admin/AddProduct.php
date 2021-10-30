<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component, WithFileUploads};
use App\Models\{Product as ProductModel, Image };
use Illuminate\Support\Facades\{ DB };
use StaySlay\Traits\Reusables;

class AddProduct extends Component
{
    public $productId;
    public string $name;
    public string $description;
    public float $price;
    public array $tags;
    public $colors, $sizes;
    protected $isteners = ['addColors', 'addSizes', 'addTags'];

    use Reusables;
 
    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
        'price' => 'required|numeric',
        'tags' => 'required|array'
    ];

    public function addColors(string $color)
    {
    }

    public function addSizes(string $size)
    {
    }

    public function addTags(string $tag)
    {
    }

    public function add($prop, $value)
    {
        if(!in_array($value, $this->$prop)){
            $this->$prop[] = $value;
        }
    }

    public function save()
    {
        $this->validate();
        
        $id = $this->productId;
        $product = New ProductModel();
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->tags = implode(', ', $this->tags);
        $product->metadata = json_encode([ 'colors' => $this->colors, 'sizes' => $this->sizes ]);
        $product->save();
        

        $images = $this->uploadMany();
        $img = New Image();
        foreach($images as $image){
            $img->imageabletype = 'product';
            $img->imageableid = $product->id;
            $img->src = $image;
            $img->save();
        }
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
