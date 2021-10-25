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
    public array $tags;
    public array $colors, $sizes;

    use Reusables;
 
    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
        'price' => 'required|numeric',
        'tags' => 'required|array'
    ];

    public function add($prop, $value)
    {
        if(!in_array($value, $this->$prop)){
            $this->$prop[] = $value;
        }
    }

    public function create()
    {
        $this->validate();

        $id  = ProductModel::insertGetId([
            'name' => $this->name, 'description' => $this->description,
            'price' => $this->price, 'tags' => implode(', ', $this->tags), 
            'metadata' => json_encode([ 'colors' => $this->colors, 'sizes' => $this->sizes ])
        ]);
        $images = $this->uploadMany();
        foreach($images as $image){
            Image::insert([
                'imageabletype'=> 'product', 'imageableid' => $id, 'src' => $image
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.add-product')
        ->extends('layouts.admin.master')->section('content');
    }
}
