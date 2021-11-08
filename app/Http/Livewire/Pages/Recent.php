<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;
use StaySlay\Traits\{ Reusables };

class Recent extends Component
{
    protected $products;
    public $recent;

    public function remove($productId)
    {
        $recent = session('recently-viewed');
        foreach ($recent as $key => $value) {
            if($value === $productId ){
                unset($recent[$key]);
            }
        }
        session()->put('recently-viewed', $recent);
    }

    public function clear()
    {
        session()->put('recently-viewed', []);
    }

    public function render()
    {
        $recent = session('recently-viewed');
        return view('livewire.pages.recent', [
            'products' => (empty($recent))? null : ProductModel::whereIn('id', $recent)->get(),
        ])->extends('layouts.app')->section('content');
    }

}