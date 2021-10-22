<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;
use App\Http\Livewire\Traits\Reusables;

class Recent extends Component
{
    protected ProductModel $products;

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
        if (!empty($recent)) {
            $this->products = ProductModel::whereIn('id', $recent)->get();
        }
        return view('livewire.pages.recent', [
            'products' => $this->products ?? []
        ])->extends('layouts.app')->section('content');
    }

}