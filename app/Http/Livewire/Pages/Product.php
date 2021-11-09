<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;
use StaySlay\Traits\Reusables;

class Product extends Component
{
    use Reusables;

    public int $productId;
    public $product;

    public function mount(Request $request, $id)
    {
        $this->productId = (int) $id;
        $this->product = ProductModel::find($this->productId);
        $recent = session("recently-viewed");
        if (!is_array($recent)) {
            session()->put('recently-viewed', [ $id ]);
            $this->emitTo('search', 'incrementRecent');
        }else{
            $size = count($recent);
            if( in_array($id, $recent) ){
            }else{
                if ($size > 9 ) {
                    array_shift($recent);
                    array_push($recent, $id);
                    session()->put('recently-viewed', $recent);
                }else{
                    session()->push('recently-viewed', $id);
                }
                $this->emitTo('search', 'incrementRecent');
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.product')->extends('layouts.app')->section('content');
    }
}
