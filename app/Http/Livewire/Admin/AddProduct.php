<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component, WithFileUploads};
use App\Models\{Product as ProductModel, Image };
use StaySlay\Traits\Reusables;

class AddProduct extends Component
{
    
    public string $name;
    public string $description;
    public float $price;
    public string $tags;

    use Reusables;
 
    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
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
            'imageabletype'=> 'product', 'imageableid' => $id, 'url' => $this->image
        ]);
    }

    public function render()
    {
        return view('livewire.admin.add-product')->extends('layouts.admin.master');
    }
}
