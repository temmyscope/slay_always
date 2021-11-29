<?php

namespace StaySlay\Traits;

use Illuminate\Support\Facades\{ DB };
use App\Models\{ Order, Product, Profile, Voucher, Promotion };

trait Payment{

  public $cart;
  public float $amount; //coupons and promotions must be applied at the point of checkout, not before
  public int $orderId;
  public float $discount;
  public string $coupon;
  public bool $couponIsActive;
  public bool $creatingRecharge = false;
  public string $reference; 
  public $taxes;
  public $voucher;
  public $sizingWithId;
  public float $sub_total; //before tax and coupon
  public float $total; //after tax and coupon

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
  
  public function updated($name, $value){
        $result = match($name){
            'sizingWithId' => $this->changeSize($value),
            default => null
        };
  }

  public function changeSize($value)
  {
    [$id, $size] = explode(':', $value);
    if( empty($value) ) return;
    
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
    
    /** taxes = [ 'vat' => value, tax => '', shipping => ''] */
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
    $this->cart->each(function($item, $key) use ($discount, &$productsDetails) {
      $productsDetails[ $item->id ?? $item['id'] ] = [
        'price' => $item->price ?? $item['price'], 'qty' => $item->qty ?? $item['qty'] ?? 1,
        'metadata' => $item->metadata ?? $item['metadata'], 'size' => $item->size ?? $item['size'] ?? 'XL',
        'color' => $item->color ?? $item['color'] ?? '',
        'image' => $item->images[0]->src ?? '', 'name' => $item->name ?? $item['name'],
        'activePrice' => percentageDecrease(($item->price ?? $item['price']), $discount),
      ];
    });

    $orderMetaData = [
      'products' => $productsDetails, 'paymentData' => [], 'taxesApplied'=> [],
      'discount' => (($discount * $this->cart->sum('price'))/100), //total amount discounted
    ];

    $taxedTotal = 0;
    if (!empty($this->taxes['taxes'])) {
      foreach ($this->taxes['taxes'] as $key => $taxPercent) {
        if ($key !== '') {
          $orderMetaData['taxesApplied'][$key] = $taxPercent;
        }
      }
    }
    if (empty($this->address['address']) || empty($this->address['state']) || empty($this->address['country']) ) {
      session()->flash('error', 'Please update your address');
      return;
    }
    $order->delivery_address = (
      $this->address['address'].' - '. $this->address['state'].', '.$this->address['country'].
      ' - '.$this->address['zip_code']
    );

    $order->metadata = json_encode($orderMetaData);
    $this->total = $order->total = $this->getTotalPrice();

    if ($this->voucher) {
      $this->total = $order->total = $order->total - $this->voucher->value;
      Voucher::where('id', $this->voucher->id)->delete();
    }
    
    $order->save();

    $this->dispatchBrowserEvent('checkoutWithPaystack', [ 'total' => $this->total ]);
  }

}