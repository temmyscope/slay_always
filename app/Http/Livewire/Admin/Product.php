<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Auth;

class Product extends Component
{

    public $productId = null;
    protected array | ProductModel $product;
    public string $name, $description, $tags = '';
    public array $others = []; //aka metadata
    public float $price;
    public int $quantity;
    public $colors, $sizes; 

    public function mount($id)
    {
        
        $this->product = ProductModel::with('images')->find($id);

        $metadata = json_decode($this->product->metadata);

        $this->fill([
            'name' => $this->product->name, 'description' => $this->product->description,
            'tags' => $this->product->tags, 'others' => json_decode($this->product->metadata),
            'price' => $this->product->price, 'quantity' => $this->product->quantity,
            'colors' => explode(',', $metadata->colors), 
            'sizes' => explode(',', $metadata->sizes)
        ]);
        
    }

    public function save()
    {
        $product = $this->product;
        if( !$this->product instanceof ProductModel){
            $product = New ProductModel();
        }
        $product->name = $this->name;
        $product->description = $this->description;
        $product->tags = $this->tags;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        foreach ($others as $key => $value) {
            $product->metadata[$key] = $value;
        }
        $product->save();
    }

    public function render()
    {
        return view('livewire.admin.product')->extends('layouts.admin.master');
    }
}
