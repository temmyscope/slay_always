<?php

namespace StaySlay\Traits;

use Illuminate\Support\Facades\{ DB };
use App\Models\{ Order, Product, Profile, Voucher, Promotion };

trait Payment{

  public $cart;
  public float $amount; //coupons and promotions must be applied at the point of checkout, not before
  public int $orderId;
  public float $dicount;
  public string $coupon;
  public bool $couponIsActive;
  public bool $creatingRecharge = false;
  public string $reference; 
  public $taxes;
  public $voucher;
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
    $this->cart->transform(function($item, $key) use($id, $color){
      if ($item['id'] == $id) {
        $item['color'] = $color;
      }
      return $item;
    });
  }

  public function changeQty($id, $qty)
  {
    $this->cart->transform(function($item, $key) use($id, $qty){
      if ($item['id'] == $id) {
        $item['qty'] = $qty;
      }
      return $item;
    });
  }

  public function changeSize($id, $size)
  {
    $this->cart->transform(function($item, $key) use($id, $size){
      if ($item['id'] == $id) {
        $item['size'] = $size;
      }
      return $item;
    });
  }

  public function applyCoupon()
  {
    //if promotion exists, apply necessary deductions
    $promotion = Promotion::currentlyRunning($this->coupon);
    $total = $this->cart->sum(function($item) {
      return $item['price']*$item['qty'];
    });
    if ( $promotion !== false) {
      $this->total = percentageDecrease($total, $promotion->coupon);
      $this->discount = $promotion->discount; $this->couponIsActive = true;
      return $this->total;
    }
    return $this->total = $total;
  }

  public function getTotalPrice(): float
  {
    $total = $this->applyCoupon();
    if (!empty($this->taxes['taxes'])) {
      foreach ($this->taxes['taxes'] as $key => $taxPercent) {
        if ($key !== '') {
          if ($key == 'shipping') {//for shipping, the amount is not in percent
            $total += (float)$taxPercent; 
          }else{
            $total += $total*($taxPercent/100);
          }
        }
      }
    }
    return ($this->voucher) ? $total - $this->voucher->value : $total;
  }
  
  public function checkout()
  {
    if (empty($this->cart)) {
      return;
    }
    $order = new Order();
    $order->user_id = auth()->user()->id;

    $order->total = $this->cart->sum('price');
    $order->txn_id = $this->reference;
    $order->status = 'pending';

    $total = $this->applyCoupon();
    $discount = $this->discount;

    $productsDetails = [];
    //loop over products and insert into $productDetails
    $products->each(function($item, $key) use ($discount, &$productsDetails) {
      $productsDetails[$item->id] = [
        'price' => $item->price, 'metadata' => $item->metadata,
        'image' => $item->images[0]->src, 'name' => $item->name,
        'activePrice' => percentageDecrease($item->price, $discount),
      ];
    });

    $orderMetaData = [
      'products' => $productsDetails, 'paymentData' => [], 'taxesApplied'=> [],
      'discount' => (($discount * $this->cart->sum('price'))/100), //total amount discounted
    ];

    $taxedTotal = 0;
    if (!empty($this->taxes['taxes'])) {
      /** taxes = [ 'vat' => value, tax => '', shipping => ''] */
      foreach ($this->taxes['taxes'] as $key => $taxPercent) {
        if ($key !== '') {
          if ($key == 'shipping') {//for shipping, the amount is not in percent
            $taxedTotal += (float)$taxPercent; 
          }else{
            $taxedTotal += percentageIncrease($total, $taxPercent);
          }
          $orderMetaData['taxesApplied'][$key] = $taxPercent;
        }
      }
    }

    $order->metadata = json_encode(
      array_merge( json_decode($order->metadata, true), $orderMetaData )
    );
    $this->total = $order->total = $taxedTotal;

    if ($this->voucher) {
      $this->total = $order->total = $taxedTotal - $this->voucher->value;
      Voucher::where('id', $this->voucher->id)->delete();
    }

    $order->save();

    $this->clearCart();

    $this->emit('checkoutWithPaystack', $this->total);
  }

}