<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use Illuminate\Support\Str;
use App\Models\{ Profile, Order, Promotion };
use StaySlay\Traits\Reusables;

class Checkout extends Component
{
    //coupons and promotions must be applied at the point of checkout , not before
    public float $amount;
    public int $orderId;
    public float $dicount;
    public bool $creatingRecharge = false;
    public string $reference; 
    public float $sub_total; //before tax and coupon
    public float $total; //after tax and coupon

    use Reusables;

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
            $user_id = auth()->user()->id();
            curl("https://stayslayfashion.com/api/transaction/verify/$reference/{$user_id}")
            ->setMethod('GET')->send();
        }
        return redirect()->to('/order-history');
    }

    public function mount($id)
    {   
        $this->reference = Str::limit(Str::uuid(), 12) . Str::random(4);
        $order = Order::where('id', $id)->where('user_id', auth()->user()->id)->first();
        $order->txn_id = $this->reference;
        $order->status = 'pending';

        $productsMetaData = json_decode($order->metadata, true)['products'];
        $products = Product::whereIn( 'id', array_keys($productsMetaData) )->get();
    
        $order->total = $products->sum(function ($product) use ($cartItems) {
            //multiply price of each product with the qty available in the cart session
            return $product->price * $cartItems[$product->id];
        });
        $productsDetails = [];
        $products->each(function($item, $key) use ($productsDetails, $productsMetaData) {
            $productsDetails[] = [
                'name' => $item->name, 'price' => $item->price, 
                'qty' => $productsMetaData[$item-id], 'metadata' => $item->metadata
            ];
        });
        $metadata = [ 'products' => $productsDetails, 'paymentData' => [] ];

        $total = $order->total;
    
        //if promotion exists, apply necessary deductions
        $promotion = Promotion::currentlyRunning();
        if ( $promotion !== false) {
            $order->coupon = $promotion->coupon;
            $total = percentageDecrease($total, $promotion->dicount);
        }

        //search for taxes applicable in metadata table and apply as necessary
        $metadata = DB::table('metadata')->whereNotNull('taxes')->first();
        $taxes = (empty($metadata)) ? ['vat' => 7.5] : json_decode($metadata->meta);

        $orderMetaData = [];
        /** taxes = [ 'vat' => value, tax => '', shipping => ''] */
        foreach ($taxes as $key => $amount) {
            $total = percentageIncrease($total, $amount);
            $orderMetaData['taxesApplied'][$key] = $amount;
        }

        $order->metadata = json_encode(
            array_merge( json_decode($order->metadata, true), $orderMetaData )
        );
        $this->total = $order->total = $total;
        $order->save();
    }

    public function render()
    {
        return view('livewire.pages.checkout', [ 'cart' => $this->cart ])
        ->extends('layouts.app')->section('content');
    }
}
