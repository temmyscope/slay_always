@section('title', 'Cart')
@section('description', 'Welcome to StaySlay - Fashion. Our Cart')
@section('keywords', 'Stay, Slay, Fashion, Cart, Add Products,')

<div>
  <nav class="w-full mt-6">
    <ul class="w-navWidth flex justify-between mx-auto">
      <li class="p-3 font-bold text-xl">
        <a href="{!! route('welcome') !!}">Home </a>
      </li>
      <button wire:click="clearCart" type="button" class="text-xl underline font-bold">
        clear all
      </button>
    </ul>
  </nav>

  @if (empty($cart) && !isset($cart[0]))
  <main class="w-full mt-10 mb-10">
    <div class="w-4/5 mx-auto">

      <div class="w-full">
        <h1 class="text-center uppercase text-3xl">shopping bag</h1>
      </div>
      <div class="w-full text-center mt-24">
        <h4 class="text-center  text-xl">Your shopping bag is empty</h4>
        <a href="{!! route('welcome') !!}">
          <button class=" lg:w-1/5 bg-black text-white lg:text-xl mt-7 rounded-md lg:p-3 p-1 hover:bg-slay">Continue shopping</button>
        </a>
      </div>
  
    </div>
  </main>
  @else
    <main class="w-full mt-10 overflow-x-auto lg:overflow-hidden flex mb-5">
      <div class="lg:w-4/5 mx-auto p-2">
  
        <div class="flex justify-between gap-1 w-full flex-wrap">

          <div class="lg:w-cartWb flex-shrink-0">

            <div class="flex justify-between ">
              <div class="w-3/5">
                <p class="font-bold">Item</p>
              </div>
              <div class="w-1/5 text-center">
                <p class="font-bold">Quantity</p>
              </div>
              <div class="w-1/5 text-center">
                <p class="font-bold">Price</p>
              </div>
            </div>

            @foreach($cart as $product)
            <div class="flex justify-between gap-4 py-3 increment px-2 mt-2">
              <div class="w-3/5 flex gap-4">
                <div class="w-1/5">
                  <img src="https://images.pexels.com/photos/2010812/pexels-photo-2010812.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                </div>
                <div class="capitalize block">
                  <p>{!! $product->name ?? $product['name']  !!}</p>

                  <p style="display: flex;align-item:center">Choose Color: &nbsp;
                  @php
                    $metadata = $product->metadata ?? $product['metadata'];
                    $colors = (is_object($metadata))? $metadata->colors : ($metadata['colors'] ?? []);
                    $sizes = (is_object($metadata))? $metadata->sizes : ($metadata['sizes'] ?? []);
                  @endphp
                  @if (!empty($colors))
                    @foreach ($colors as $index => $item)
                    <input 
                      type="radio" name="slide" id="slide{!!($product->id ?? $product['id']).'-'.$item!!}" 
                      class="hidden mr-2" {!! ($index==0)?'checked':'' !!}
                      wire:click="changeColor({!!$product->id ?? $product['id']!!}, '{!! $item !!}')"
                    >
                    <label
                      class="p-2 border-solid border-2 border-gray-400 check{!!($product->id ?? $product['id']).'-'.$item!!} 
                      inline-block cursor-pointer rounded-full"
                      for="slide{!!($product->id ?? $product['id']).'-'.$item!!}" style="border-radius: 50%;margin:2px;"
                    >
                    </label>
                    <style>
                    #slide{!!($product->id ?? $product['id']).'-'.$item!!}:checked ~ .check{!!($product->id ?? $product['id']).'-'.$item!!}  {
                      background: {!! strtolower($item) !!};
                    }
                    </style>
                    @endforeach
                  </p>
                  @endif
                  <p>Choose size: &nbsp;
                    <select name="sizing" wire:model="sizingWithId">
                    @foreach ([6,8,10,12,14,16,18,20,22,24,26] as $item)
                    <option 
                value="{!! ($product->id ?? $product['id']).':'.$item !!}"
                    />
                    Size {!! $item !!}
                    </option>
                    @endforeach
                    </select>
                        
                  </p>
                  <a href="{!! route('category', ['category' => $product->category ?? $product['category'] ]) !!}" class="font-bold text-slayText">
                    continue shopping
                  </a>
                  <div class="flex gap-2 mt-4 w-full p-1 items-center">
                    <small class="font-bold">remove item</small>
                    <button wire:click="$emit('deleteItem', {!!$product->id ?? $product['id']!!})" 
                      class="rounded-full bg-bgSec text-gray-400 text-center py-2 px-3"
                    >
                      <span class="fas fa-trash"></span>
                    </button>
                  </div>
                </div>
              </div>
              
              <div class=" w-1/5 flex gap-2 justify-center">
                <div class="flex gap-2 increment p-2 max-h-10 w-1/2 justify-between">
                  <p class="cursor-pointer" 
                    wire:click="changeQty({!! $product->id ?? $product['id'] !!}, {!! ($product->qty ?? $product['qty'])-1 !!})"
                  >
                    <span class="fas fa-minus"></span>
                  </p>
                  <p>{!! $product->qty ?? $product['qty'] !!}</p>
                  <p class="cursor-pointer"
                    wire:click="changeQty({!! $product->id ?? $product['id'] !!}, {!! ($product->qty ?? $product['qty'])+1 !!})"
                  >
                    <span class="fas fa-plus"></span>
                  </p>
                </div>
              </div>
  
              <div class="w-1/5">
                <p class="text-center">
                  &#8358;{!! number_format($product->price ?? $product['price']) !!}
                </p>
                <div class="mt-9 flex gap-1 items-center justify-center">
                  <button 
                    wire:click="addToFavorite({!! $product->id ?? $product['id'] !!})" 
                    class="rounded-full bg-bgSec text-gray-400 text-center py-2 px-3"
                  >
                    <span class="{!! (App\Models\Product::liked($product->id ?? $product['id']))? 'fa fa-heart':'far fa-heart' !!}">
                    </span>
                    <span wire:loading wire:target="addToFavorite">
                      <i class="fa fa-spinner faa-spin animated"></i>
                    </span>
                  </button>
                  
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
  
          <div class="lg:w-cartWs bg-gray-300 flex-shrink-0 max-h-full mt-6 rounded-md">
            <div class="p-2 flex gap-1">
              <input 
                type="text" name="name" id="name" placeholder="Coupon code" wire:model="coupon"
                class="w-9/12 py-1 increment focus:ring-0 focus:outline-none px-2"
              >
              @if ($isLoggedIn)
              <button 
                class="bg-bgSec text-white w-28 text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-md " 
                type="button" wire:click=""
              >
                Apply
              </button>
              @endif
            </div>

            <div class="flex justify-between p-2 mt-2">
              <p>Subtotal</p>
              <p>&#8358;{!! number_format($cart->sum('price')) !!}</p>
            </div>

            @if ($voucher && !empty($voucher))
            <div class="flex justify-between p-2 mt-2">
              <p>Voucher</p>
              <p>&#8358;{!! number_format($voucher->value) !!}</p>
            </div>
            @endif

            @foreach ($taxes['taxes'] as $tax => $value)
              @if ($value === '')
              @else
                @if ($tax == 'shipping')
                  <div class="flex justify-between p-2 mt-2">
                    <p>{!! ucfirst($tax) !!}</p>
                    <p>&#8358;{!! $value !!}</p>
                  </div>
                @else
                  <div class="flex justify-between p-2 mt-2">
                    <p>{!! ucfirst($tax) !!}</p>
                    <p>{!! $value !!}%</p>
                  </div>
                @endif
              @endif
            @endforeach

            <hr />
            
            <div class="flex justify-between p-2 mt-2">
              <p>Total </p>
              <p>&#8358;{!! number_format($this->getTotalPrice()) !!}</p>
            </div>

            <div class="p-2 text-center">
              @if ($deliveryAddressSet)
              <p class="font-bold">Use my delivery address or 
                <a href="{!! route('edit-address') !!}" class="text-slayText font-bold underline">change address</a>
              </p>
              @else
              <p class="font-bold">
                <a href="{!! route('edit-address') !!}" class="text-slayText font-bold underline">update address</a>
              </p>
              @endif
            </div>
            @if ( $isLoggedIn )
            <div class="p-1">
              <button 
                wire:click="checkout" id="paymentButton"
                class="bg-bgSec text-white w-full text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-md"
              >
                <span wire:loading.remove wire:target="checkout">Checkout</span>
                <span wire:loading wire:target="checkout">
                  Please wait... <i class="fa fa-spinner faa-spin animated"></i>
                </span>
              </button>
            </div>
            @else
            <div class="p-1">
              <button 
                id="paymentButton" wire:click="signInToContinue"
                class="bg-bgSec text-white w-full text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-md"
              > Sign In To Continue 
                <span wire:loading wire:target="signInToContinue">
                  <i class="fa fa-spinner faa-spin animated"></i>
                </span>
              </button>
            </div>
            @endif

            <div class="p-1 text-center" style="color: red">
              {!! session('error') !!}
            </div>
          </div>
        </div>
  
        </div>
        
      </div>
    </main>
  
  @endif
  
  @livewire('recommended')
  
  <script src="https://js.paystack.co/v2/inline.js"></script>
  <script>
  window.addEventListener('checkoutWithPaystack', async(event) => {
    let total = event.detail.total;
    await (new PaystackPop).checkout({
      key: "{!! env('PAYSTACK_PUBLIC_KEY') !!}", 
      currency: 'NGN', ref: '{!! $reference ?? "" !!}',
      email: '{!! auth()->user()?->email !!}', 
      amount: total * 100, //amount in kobo
      style: { theme: "dark" },
      onSuccess: async function(response) {
        Livewire.emit('clearCart');
        setTimeout(() => {
        window.location.href= `{!! env('APP_URL') !!}/order-history?reference=${response.reference}`;
        }, 3000);
      },
      onCancel: function() {
        Livewire.emit('removeOrder', '{!! $reference ?? "" !!}');
      },
    });
  });
  </script>

</div>