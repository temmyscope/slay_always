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

    public function mount($product = null)
    {
        $this->productId = $product;
        $product = ProductModel::find($id);
        $this->fill([
            'name' => $product->name, 'description' => $product->description,
            'price' => $product->price, 'tags' => explode(', ', $product->tags),
        ]);
    }

    public function save()
    {
        $this->validate();
        $id = null;
        if (!is_null($this->productId)) {
            $id = $this->productId;
            ProductModel::where('id', $id)
            ->update([
                'name' => $this->name, 'description' => $this->description,
                'price' => $this->price, 'tags' => implode(', ', $this->tags), 
                'metadata' => json_encode([ 'colors' => $this->colors, 'sizes' => $this->sizes ])
            ]);
        } else {
            $id  = ProductModel::insertGetId([
                'name' => $this->name, 'description' => $this->description,
                'price' => $this->price, 'tags' => implode(', ', $this->tags), 
                'metadata' => json_encode([ 'colors' => $this->colors, 'sizes' => $this->sizes ])
            ]);
        }
        
       
        $images = $this->uploadMany();
        foreach($images as $image){
            Image::insert([
                'imageabletype'=> 'product', 'imageableid' => $id, 'src' => $image
            ]);
        }
    }

    public function render()
    {
        $tags = DB::table('metadata')->whereNotNull('meta->categories')->first();
        $colors = DB::table('metadata')->whereNotNull('meta->colors')->first();
        $sizes = DB::table('metadata')->whereNotNull('meta->sizes')->first();
        return view('livewire.admin.add-product', [
            'tagOptions' => json_decode($tags->meta), 
            'colorOptions' => json_decode($colors->meta), 
            'sizeOptions' => json_decode($sizes->meta)
        ])->extends('layouts.admin.master')->section('content');
    }
}
