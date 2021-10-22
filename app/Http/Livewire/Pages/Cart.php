<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use App\Models\{ Product, Order };
use Illuminate\Support\Facades\{ DB };
use StaySlay\Traits\Reusables;

class Cart extends Component
{
    protected $cart = [];

    use Reusables;

    public function checkout()
    {
        $cartItems = session('user-cart');
        if (is_array($cartItems) && !empty($cartItems) ) {
            $productIds = array_keys($cartItems);
            $products = Product::whereIn('id', $productIds)->get();
            $metadata = [
                'products' => $cartItems,
                'paymentData' => []
            ];
            $orderId = Order::getInsertId([
                'user_id' => auth()->user()->id, 
                'metadata' => json_encode($metadata),
                'total' => 0
            ]);
            redirect()->to('checkout/'.$orderId);
        }
    }

    public function clearCart()
    {
        session()->remove('user-cart');
        return redirect('');
    }

    public function render()
    {
        $cartItems = session('user-cart');
        $products = null;
        if (!empty($cartItems)) {
            $productIds = array_keys($cartItems);
            $products = Product::whereIn('id', $productIds)->get();
        }
        return view('livewire.pages.cart', [
            'cart' => $products ?? []
        ])->extends('layouts.app');
    }
}
