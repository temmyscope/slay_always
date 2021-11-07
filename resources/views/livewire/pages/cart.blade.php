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

    @if (empty($cart))
      <main class="w-full mt-10">
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
      <main class="w-full mt-10 overflow-x-auto lg:overflow-hidden flex">
        <div class="lg:w-4/5 mx-auto p-2 bg-white">
    
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
              <div class="flex justify-between gap-4 py-3 increment px-2">
                <div class="w-3/5 flex gap-4">
                  <div class="w-1/5">
                    <img src="https://images.pexels.com/photos/2010812/pexels-photo-2010812.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                  </div>
                  <div class="capitalize block">
                    <p>{!! $product->name !!}</p>
                    <p style="display: flex;align-item:center">Choose Color: &nbsp;
                    @if (!empty($product->metadata->colors))
                    @foreach ($product->metadata->colors as $index => $item)
                    <input 
                      type="radio" name="slide" id="slide{!!$product->id.'-'.$item!!}" 
                      class="hidden mr-2" {!! ($index==0)?'checked':'' !!}
                      wire:click.prevent="changeColor({!!$product->id!!}, '{!! strtolower($item) !!}')"
                    >
                    <label for="slide{!!$product->id.'-'.$item!!}" 
                      class="p-2 border-solid border-2 border-gray-400 check{!!$product->id.'-'.$item!!} inline-block cursor-pointer rounded-full">
                    </label>
                    <style>
                    #slide{!!$product->id.'-'.$item!!}:checked ~ .check{!!$product->id.'-'.$item!!}  {
                      background: {!! strtolower($item) !!};
                    }
                    </style>
                    @endforeach
                    </p>
                  @endif
                    <p>size: sm</p>
                    <a href="{!! route('category', ['category' => $product->category ]) !!}" class="font-bold text-slayText">
                      continue shopping
                    </a>
                    <div class="flex gap-2 mt-4 w-full p-1 items-center">
                      <small class="font-bold">remove item</small>
                      <button wire:click="$emit('deleteItem')" 
                        class="rounded-full bg-bgSec text-gray-400 text-center py-2 px-3"
                      >
                        <span class="fas fa-trash"></span>
                      </button>
                    </div>
                  </div>
                </div>
                
                <div class=" w-1/5 flex gap-2 justify-center">
                  <div class="flex gap-2 increment p-2 max-h-10 w-1/2 justify-between">
                    <p class="cursor-pointer"><span class="fas fa-minus"></span></p>
                    <p>0</p>
                    <p class="cursor-pointer"><span class="fas fa-plus"></span></p>
                  </div>
                </div>
    
                <div class="text-center w-1/5">
                  <p>&#8358;{!! number_format($product->price) !!}</p>
                  <div class="mt-9 flex gap-1 items-center justify-center">
                    <button wire:click="addToFavorite" class="rounded-full bg-bgSec text-gray-400 text-center py-2 px-3">
                      <span class="{!! ($product->liked())? 'fa fa-heart':'far fa-heart' !!}"></span>
                      <span wire:loading wire:target="addToFavorite">
                        <i class="fa fa-spinner faa-spin animated"></i>
                      </span>
                    </button>
                    
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>
    
            <div class="lg:w-cartWs bg-gray-300 flex-shrink-0 max-h-44 mt-6 rounded-md">
              <div class="p-2 flex gap-1">
                <input type="text" name="name" id="name" placeholder="Coupon code" class="w-9/12 py-1 increment focus:ring-0 focus:outline-none px-2">
                <button class="bg-bgSec text-white w-28 text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-md " type="button">
                  Apply
                </button>
              </div>
              <div class="flex justify-between p-2 mt-5">
                <p>Subtotal ({!! $cart->count() !!} items)</p>
                <p>&#8358;{!! number_format($cart->sum('price')) !!}</p>
              </div>

              @foreach ($taxes['taxes'] as $tax => $value)
                @if ($value === '')
                @else
                  @if ($tax == 'shipping')
                    <div class="flex justify-between p-2 mt-5">
                      <p>{!! ucfirst($tax) !!}</p>
                      <p>&#8358;{!! $value !!}</p>
                    </div>
                  @else
                    <div class="flex justify-between p-2 mt-5">
                      <p>{!! ucfirst($tax) !!}</p>
                      <p>{!! $value !!}%</p>
                    </div>
                  @endif
                @endif
              @endforeach

              <div class="p-2 text-center">
                @if ($deliveryAddressSet)
                <p class="font-bold">Use my delivery address or 
                  <a href="{!! route('edit-address') !!}" class="text-slayText font-bold underline">update address</a>
                </p>
                @else
                <p class="font-bold">
                  <a href="{!! route('edit-address') !!}" class="text-slayText font-bold underline">update address</a>
                </p>
                @endif
              </div>
              <div class="p-2">
                <a href="#">
                  <button 
                    wire:click="checkout" id="paymentButton"
                    class="bg-bgSec text-white w-full text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-md"
                  >
                    Checkout
                    <span wire:loading wire:target="checkout">
                      Please wait... <i class="fa fa-spinner faa-spin animated"></i>
                    </span>
                  </button>
                </a>
              </div>
            </div>
          </div>
    
          </div>
          
        </div>
      </main>
    
    @endif
    
    @livewire('recommended')

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Info</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-message">
                </div>
            </div>
        </div>
    </div>

    
    @push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js')}}"></script>
    <script src="https://js.paystack.co/v2/inline.js"></script>
    <script>
    Livewire.on('checkoutWithPaystack', () => {
      var user_id = {!! auth()->user()->id !!};
      var handler = PaystackPop.setup({
        key: {!! env('PAYSTACK_PUBLIC_KEY') !!}, 
        currency: 'NGN', ref: {!! $reference !!},
        email: {!! auth()->user()->email !!}, 
        amount: {!! $total !!} * 100, //amount in kobo
        metadata: @php $cart ? print_r($cart->all()) : null; @endphp
        callback: async function(response) {
            document.getElementById(
                "modal-body-message"
            ).innerHTML = "Transaction Completed. Redirecting...";
            fetch(`https://stayslayfashion.com/api/transaction/verify/${response.reference}/${user_id}`, {
                method: "GET", headers: { 'Accept': 'application/json' },
            }).then(res => res.json()).then(data => {
                window.location.href="/order-history";
            }).catch(err => console.log(err));
        },
        onClose: function() {
            document.getElementById(
                "modal-body-message"
            ).innerHTML = "Transaction was not completed, window closed.";
        },
      });
      handler.openIframe();
    });
    </script>
    @endpush    
</div>