<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component, WithFileUploads};
use App\Models\{Product as ProductModel, Image };

class AddProduct extends Component
{

    use WithFileUploads;
    
    public string $name;
    public string $description;
    public $image;
    public float $price;
    public string $tags;
 
    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
        'image' => 'image|max:5098',
        'price' => 'required|numeric',
        'tags' => 'required|string'
    ];
    public function saveImage()
    {
        $this->image->store('cdn');
    }

    public function create()
    {
        $this->validate();

        $id  = ProductModel::insertGetId([
            'name' => $this->name, 'description' => $this->description,
            'price' => $this->price, 'tags' => $this->tags
        ]);

        Image::insert([
            'imageabletype'=> 'product', 'imageableid' => $id,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.add-product')->extends('layouts.admin.master');
    }
}
