<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;
use StaySlay\Traits\Reusables;

class Product extends Component
{
    public int $productId;
    protected $product;

    public function addToRecent($id)
    {
        $this->product = ProductModel::find($this->productId);
        $recent = session("recently-viewed");
        if (!is_array($recent)) {
            session()->put('recently-viewed', [ $id ]);
        }else{
            $size = count($recent);
            if ($size > 9 ) {
                array_shift($recent);
                array_push($recent, $id);
                session()->put('recently-viewed', $recent);
            }else{
                session()->push('recently-viewed', $id);
            }
        }
    }

    public function mount(Request $request, $id)
    {
        $this->productId = (int) $id;
    }

    public function render()
    {
        //₦
        return view('livewire.pages.product', [
            'product' => $this->product
        ])->extends('layouts.app')->section('content');
    }
}
