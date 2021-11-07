<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Order, Product };

class Invoice extends Component
{
    protected $order, $products;

    public function mount($txn_id)
    {
        $order = Order::where('txn_id', $txn_id)
        ->where('status', 'completed')->first();
        if (!empty($order)) {
            $items = json_decode($order->items, true);
            $productIds = array_keys($items);
            
            $products = Product::whereIn('id', $productIds)->get();
            $prod = [];
    
            $products->each(function($key, $index) use($prod){
                $prod[$index] = $key;
                //over-write quantity with the one used in the order
                $prod[$index]->quantity = $items[$key->id];
            });
            $this->products = $prod;
        }
    }

    public function render()
    {
        return view('livewire.pages.invoice', [
            //'order' => $this->order, 'products' => $this->products
        ])->extends('layouts.app')->section('content');
    }
}
