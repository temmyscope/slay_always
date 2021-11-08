<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\{ DB };
use StaySlay\Traits\{ Payment, Reusables };
use App\Models\{ Order, Product, Profile, Voucher, Promotion };

class Cart extends Component
{
    use Payment, Reusables;

    protected $listeners = ['deleteItem','clearCart','removeOrder'];
    public bool $deliveryAddressSet;
    public array $address;

    //the recharge context mean that we're trying to use the paystack_token to charge a user
    public function mount()
    {
        $cartItems = $this->fetchCart();
        $products = null;
        if (!empty($cartItems)) {
            $productIds = array_keys($cartItems);
            $products = Product::where('deleted', 'false')
            ->whereIn('id', $productIds)->get();
            $products->transform(function($item, $key) use ($cartItems){
                $item->qty = $cartItems[$item->id];
                $item->color = '';
                $item->size = 'XL';
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
        $profile = auth()->user()->profile;

        $this->coupon = ($promo !== false) ? $promo->coupon : '';

        $this->fill([
            'couponIsActive' => ($promo !== false)? true : false, 
            'coupon' => ($promo !== false)? $promo->coupon : '',
            'deliveryAddressSet' => ($profile && $profile->address)? true : false,
            'address'=> [
                'address' => $profile?->address ?? '', 'state' => $profile?->state ?? '', 
                'country' => $profile?->country ?? '', 'zip_code' => $profile?->zip_code ?? '',
            ], 'discount' => ($promo !== false)? $promo->discount : 0, 
            'total' => $this->applyCoupon(),
            'taxes' => json_decode(
                DB::table('metadata')->whereNotNull('meta->taxes')->first()->meta, true
            ), 'voucher' => Voucher::where('user_id', auth()->user()->id)->first(),
            'reference' => strtoupper(str_replace('-','', Str::uuid()->toString()))
        ]);
    }

    public function deleteItem($product)
    {
        $this->cart = ($this->cart->filter(
            fn($item, $key) => !(($item->id ?? $item['id']) == $product)
        ))->collect();
        $this->deleteFromCart($product);
    }

    public function render()
    {
        return view('livewire.pages.cart')
        ->extends('layouts.app')->section('content');
    }

    public function removeOrder($transactionId)
    {
        Order::where('txn_id', $transactionId)->delete();
    }
}
