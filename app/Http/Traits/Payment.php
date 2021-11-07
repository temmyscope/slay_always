<?php

namespace StaySlay\Traits;

use Illuminate\Support\Facades\{ DB };
use App\Models\{ Order, Product, Profile, Promotion };

trait Payment{

  public $cart;
  public float $amount; //coupons and promotions must be applied at the point of checkout, not before
  public int $orderId;
  public float $dicount;
  public string $coupon;
  public bool $couponIsActive;
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
          $user_id = auth()->user()->id();
          curl("https://stayslayfashion.com/api/transaction/verify/$reference/{$user_id}")
          ->setMethod('GET')->send();
      }
      return redirect()->to('/order-history');
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

  public function applyCoupon()
  {
    //if promotion exists, apply necessary deductions
    $promotion = Promotion::currentlyRunning($this->coupon);
    if ( $promotion !== false) {
      $this->total = percentageDecrease($this->cart->sum('price'), $promotion->coupon);
      $this->couponIsActive = true; $this->discount = $promotion->discount;
      return $this->total;
    }
    return $this->cart->sum('price');
  }
  
  public function checkout()
  {
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

      $total = $this->applyCoupon();
      $discount = $this->discount;

      //loop over products and insert into $productDetails
      $products->each(function($item, $key) use (
          &$productsDetails, $productsMetaData, $discount
      ) {
          $productsDetails[$item->id] = [
            'price' => $item->price, 'metadata' => $item->metadata,
            'image' => $item->images[0]->src, 'name' => $item->name,
            'activePrice' => percentageDecrease($item->price, $dicount),
          ];
      });
      $orderMetaData = [
        'products' => $productsDetails, 'paymentData' => [], 'taxesApplied'=> [],
        'discount' => $discount * $this->cart->sum('price'), //total amount discounted
      ];
  
      //search for taxes applicable in metadata table and apply as necessary
      $metadata = DB::table('metadata')->whereNotNull('taxes')->first();
      $taxes = (empty($metadata)) ? [] : json_decode($metadata->meta);

      if (!empty($taxes)) {
          /** taxes = [ 'vat' => value, tax => '', shipping => ''] */
          foreach ($taxes as $key => $taxPercent) {
              $total = percentageIncrease($total, $taxPercent);
              $orderMetaData['taxesApplied'][$key] = $taxPercent;
          }
      }

      $order->metadata = json_encode(
          array_merge( json_decode($order->metadata, true), $orderMetaData )
      );
      $this->total = $order->total = $total;
      $order->save();
      session()->forget('user-cart');
      $this->emit('checkoutWithPaystack');
  }

}