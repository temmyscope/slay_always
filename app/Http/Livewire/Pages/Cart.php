<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use Illuminate\Support\Str;
use StaySlay\Traits\{ Payment, Reusables };
use App\Models\{ Order, Product, Profile, Promotion };

class Cart extends Component
{
    use Payment, Reusables;

    protected $listeners = ['deleteItem'];
    public bool $deliveryAddressSet;

    //the recharge context mean that we're trying to use the paystack_token to charge a user
    public function mount()
    {
        $cartItems = $this->fetchCart();
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
        $this->cart = $products ? $products->collect() : $products;
        if (is_null($this->cart)) {
            return;
        }

        $promo = Promotion::currentlyRunning();
        $this->fill([
            'couponIsActive' => ($promo !== false)? true : false, 
            'coupon' => ($promo !== false)? $promo->coupon : '',
            'discount' => ($promo !== false)? $promo->discount : 0, 'total' => ($promo !== false)? 
            percentageDecrease($this->cart->sum('price'), $promo->coupon) : $this->cart->sum('price')
        ]);
        $this->reference = strtoupper(Str::uuid()->toString());
        
        if (!empty($this->cart) ) {
            $metadata = [
                'products' => $this->cart, 'paymentData' => []
            ];
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->metadata = json_encode($metadata);
            $order->total = $this->cart->sum('price');
            $order->txn_id = $this->reference;
            $profile = auth()->user()->profile;
            if ($profile->address) {
                $this->deliveryAddressSet = false;
            }
            $order->delivery_address = (
                $profile->address.', '.$profile->state.', '.$profile->country.'; '.$profile->zip_code
            );
            $order->save();
        }
    }

    public function deleteItem($product)
    {
        $this->cart = ($this->cart->filter(
            fn($item, $key) => !($item->id == $product)
        ))->get();
        $this->deleteFromCart($product);
    }

    public function render()
    {
        return view('livewire.pages.cart')
        ->extends('layouts.app')->section('content');
    }
}
