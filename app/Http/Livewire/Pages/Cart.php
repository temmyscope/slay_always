<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use App\Models\{ Product, Order };
use Illuminate\Support\Facades\{ DB };
use StaySlay\Traits\Reusables;

class Cart extends Component
{
    public $cart;
    protected $listeners = ['deleteItem'];

    use Reusables;

    public function deleteItem($product)
    {
        $this->cart = ($this->cart->filter(
            fn($item, $key) => !($item->id == $product)
        ))->get();
        $this->deleteFromCart($product);
    }

    public function changeColor($id, $color)
    {
        $this->cart = $this->cart->transform(function($item, $key) use($id, $color){
            if ($item->id == $id) {
                $item->metadata->color = $color;
            }
            return $item;
        });
    }

    public function changeSize($id, $size)
    {
        $this->cart->transform(function($item, $key) use($id, $size){
            if ($item->id == $id) {
                $item->metadata->size = $size;
            }
            return $item;
        });
    }

    public function checkout()
    {
        if (!empty($this->cart) ) {
            $metadata = [
                'products' => $this->cart,
                'paymentData' => []
            ];
            $orderId = Order::insertGetId([
                'user_id' => auth()->user()->id, 
                'metadata' => json_encode($metadata),
                'total' => $cart->sum('price')
            ]);
            redirect()->to('checkout/'.$orderId);
        }
    }

    public function clearCart()
    {
        session()->remove('user-cart');
        return redirect('');
    }

    public function mount()
    {
        $cartItems = session('user-cart');
        $products = null;
        if (!empty($cartItems)) {
            $productIds = array_keys($cartItems);
            $products = Product::whereIn('id', $productIds)->get();
            $products->transform(function($item, $key){
                $item->metadata = json_decode($item->metadata);
                $item->category = array_map('trim', explode(',', $item->tags))[0];
                return $item;
            });
        }
        $this->cart = $products? $products->collect() : $products;
    }

    public function render()
    {
        return view('livewire.pages.cart')->extends('layouts.app')->section('content');
    }
}
