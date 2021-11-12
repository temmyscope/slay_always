<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Auth;

class Product extends Component
{

    public $productId = null;
    protected array | ProductModel $product;
    public string $name, $description, $tags;
    protected $others; //aka metadata
    public float $price;
    public int $quantity;
    public $colors, $sizes; 
    protected const COLORS = [
        "AliceBlue","AntiqueWhite","Aqua","Aquamarine", "Azure", 
        "Beige", "Bisque", "Black", "BlanchedAlmond", "Blue", "BlueViolet", "Brown", "BurlyWood",
        "CadetBlue", "Chartreuse", "Chocolate", "Coral", "CornflowerBlue", "Cornsilk", "Crimson", "Cyan",
        "DarkBlue", "DarkCyan", "DarkGoldenRod", "DarkGray", "DarkGrey", "DarkGreen", "DarkKhaki", "DarkMagenta",
        "DarkOliveGreen", "DarkOrange", "DarkOrchid", "DarkRed", "DarkSalmon", "DarkSeaGreen",
        "DarkSlateBlue", "DarkSlateGray", "DarkSlateGrey", "DarkTurquoise", "DarkViolet", "DeepPink",
        "DeepSkyBlue", "DimGray","DimGrey", "DodgerBlue", "FireBrick","FloralWhite","ForestGreen","Fuchsia",
        "Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow",
        "HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki",
        "Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue",
        "LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey",
        "LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray",
        "LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen",
        "Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple",
        "MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue",
        "MintCream","MistyRose","Moccasin", "NavajoWhite","Navy", "OldLace","Olive","OliveDrab","Orange","OrangeRed",
        "PaleGoldenRod","PaleGreen", "PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum",
        "PowderBlue","Purple", "RebeccaPurple","Red","RosyBrown","RoyalBlue",
        "SaddleBrown","Salmon", "SandyBrown", "SeaGreen", "SeaShell", "Sienna", "Silver",
        "SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue",
        "Tan","Teal","Thistle","Tomato","Turquoise", "Violet", "Wheat","White","WhiteSmoke", "Yellow","YellowGreen"
    ];

    public function mount($id = null)
    {
        $this->product = ($id) ? ProductModel::find($id) : null;

        $metadata = json_decode($this->product->metadata);

        $this->fill([
            'name' => $this->product?->name, 'description' => $this->product?->description,
            'tags' => $this->product?->tags, 'price' => $this->product?->price, 
            'others' => json_decode($this->product->metadata ?? []),
            'quantity' => $this->product?->quantity,
            'colors' => $metadata?->colors, 'sizes' => $metadata?->sizes
        ]);
        
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'tags' => 'required|string',
            'quantity' => 'required|number',
            'colors' => 'required|string',
        ]);
        $product = $this->product;
        if( !$this->product instanceof ProductModel){
            $product = New ProductModel();
        }
        $product->name = ucfirst(strtolower($this->name));
        $product->description = $this->description;
        $product->tags = $this->tags;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        foreach ($this->others as $key => $value) {
            $product->metadata[$key] = $value;
        }
        $product->save();
    }

    public function render()
    {
        return view('livewire.admin.product')->extends('layouts.admin.master');
    }
}
