<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use App\Models\{ Product, Order };
use Illuminate\Support\Facades\{ DB };
use StaySlay\Traits\Reusables;

class Cart extends Component
{
    protected $cart = [];
    public bool $showCheckoutButton;

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
            Order::insert([
                'user_id' => auth()->user()->id, 
                'metadata' => json_encode($metadata),
            ]);
        }
    }

    public function deleteFromCart($id)
    {
        $cartItems = session('user-cart');
        foreach ($cartItems as $product => $qty) {
            if($id === $product ){
                unset($cartItems[$product]);
                break;
            }
        }
        session()->put('user-cart', $cartItems);
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
        }else{
            $this->showCheckoutButton = false;
        }
        return view('livewire.pages.cart', [
            'cart' => $products ?? []
        ])->extends('layouts.app');
    }
}
