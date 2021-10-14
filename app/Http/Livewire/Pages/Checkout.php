<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\{ Auth, DB };
use Illuminate\Support\Str;
use App\Models\{ Profile, Order, Promotion };

class Checkout extends Component
{
    //coupons and promotions must be applied at the point of checkout , not before
    public float $amount;
    public int $orderId;
    public bool $creatingRecharge = false;
    public string $reference; 
    public float $sub_total; //before tax and coupon
    public float $total; //after tax and coupon

    //the recharge context mean that we're trying to use the paystack_token to charge a user
    public function createRecharge()
    {
        $this->creatingRecharge = true;
        $this->validate([
            'amount'=>'required|numeric'
        ]);
        $profile = Profile::where('id',  Auth::id())->first();
        $response = createRecharge(
            amount: $this->amount, 
            authCode: $profile->paystack_token,
            email: $profile->metadata->customer->email
        );
        $this->creatingRecharge = false;
        if ($response['status'] === 'success') {

        }
        return redirect()->to('/order-history');
    }

    public function applyPromotions()
    {
        Order::insert([
            'cart_id' => $id, 'txn_id' => $this->reference, 
        ]);
    }

    public function mount($id)
    {
        $this->cart = Cart::find($id);
        $this->reference = Str::limit(Str::uuid(), 12) . Str::random(4);
        if (!empty($this->cart)) {
            
        }
        $order = [
            'cart_id' => $id, 'txn_id' => $this->reference, 
            'total' => $this->cart->sub_total, 'status' => 'pending'
        ];
        $promotion = Promotion::currentlyRunning();
        $total = $this->cart->sub_total;
        if ( $promotion !== false) {
            $order['coupon'] = $running->coupon;
            /** taxes = [ 'vat' => value, tax => '', shipping => ''] */
            
            $total = percentageDecrease($total, $running->dicount);
        }
        $metadata = DB::table('metadata')->whereNotNull('meta', 'vat')->first();
        $taxes = (empty($metadata)) ? ['vat' => 7.5] : json_decode($metadata->meta);

        $orderMetaData = [];
        foreach ($taxes as $key => $amount) {
            $total = percentageIncrease($total, $amount);
            $orderMetaData['taxesApplied'][] = $key;
        }
        $order['metadata'] = json_encode($orderMetaData);
        $this->total = $order['total'] = $total;
        $this->orderId = Order::insertGetId($order);
    }

    public function render()
    {
        return view('livewire.pages.checkout', [ 'cart' => $this->cart ])->extends('layouts.app');
    }
}
