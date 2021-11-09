# StaySlay


### Colors


*** lines, borders and carets (shapes generally): #b7b7b7 *** [br]
*** Theme color: #eb822a ***
*** shade of black: rgba(1,1,1,255) or #010101 ***
*** shade of white: #fcfdff  ***


*** Livewire Notes ***
- Always wrap your livewire view code with a div
- the render method should always contain the view()->extends()->section();

- product metadata on order follows this:

```php

  'price' => ..., 
  'metadata' => $item->metadata,
  'activePrice' => (
      $promotion !== false
  ) ? percentageDecrease($item->price, $promotion->dicount) : $item->price,
  'qty' => $productsMetaData[$item->id], 
  'name' => ...


```
```php
//scrapped
//charge a customer using previous token
if (!function_exists('createRecharge')) {
  function createRecharge(string $authCode, string $email, float $amount): array | object
  {
    $response = curl('https://api.paystack.co/transaction/charge_authorization')
    ->setMethod('POST')->setData([
      'authorization_code'=> $authCode, 'email' => $email, 'amount' => $amount*100 //amount in kobo
    ])->setHeaders([ 
      'Authorization: key=' . env('PAYSTACK_SECRET_KEY'), 'content-type: application/json'
    ])->send();
    return json_decode($response, true);
  }
}
```


---Invoice & Chat have been abandoned