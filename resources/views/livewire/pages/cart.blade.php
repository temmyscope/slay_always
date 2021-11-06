@section('title', 'Cart')
@section('description', 'Welcome to StaySlay - Fashion. Our Cart')
@section('keywords', 'Stay, Slay, Fashion, Cart, Add Products,')

<div>
    
    <nav class="w-full mt-6">
      <ul class="w-navWidth flex mx-auto">
      <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('welcome') !!}">Home</a>
      </li>
      <li class="p-3 text-gray-400 text-xl">
          <a>Shopping bag</a>
      </li>
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

              @foreach($cart as $item)
              <div class="flex justify-between gap-4 py-3 increment px-2">
                <div class="w-3/5 flex gap-4">
                  <div class="w-1/5">
                    <img src="https://images.pexels.com/photos/2010812/pexels-photo-2010812.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                  </div>
                  <div class="capitalize block">
                    <p>Glow Up Rhinestone Tights - Black</p>
                    <p>color: Black</p>
                    <p>size: sm</p>
                    <a href="./index.html" class="font-bold text-slayText">continue shopping</a>
                    <div class="flex gap-2 mt-4 w-full p-1 items-center">
                      <small class="font-bold">remove item</small>
                      <button class="rounded-full bg-bgSec text-gray-400 text-center py-2 px-3">
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
                  <p>&#8358;25,000</p>
                  <div class="mt-9 flex gap-1 items-center justify-center">
                    <small class="font-bold">Add to Favourite</small>
                    <button class="rounded-full bg-bgSec text-gray-400 text-center py-2 px-3">
                      <span class="far fa-heart"></span>
                    </button>
                    
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>
    
            <div class="lg:w-cartWs bg-gray-300 flex-shrink-0 max-h-44 mt-6 rounded-md">
              <div class="p-2 flex gap-1">
                <input type="text" name="name" id="name" placeholder="Discount code" class="w-9/12 py-1 increment focus:ring-0 focus:outline-none px-2">
                <button class="bg-bgSec text-white w-28 text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-md " type="button">
                  Apply
                </button>
              </div>
              <div class="flex justify-between p-2 mt-5">
                <p>Subtotal (2 items)</p>
                <p>Naira &#8358;30,000</p>
              </div>
              <div class="p-2">
                <a href="#">
                  <button class="bg-bgSec text-white w-full text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-md">
                    Checkout
                  </button>
                </a>
              </div>
            </div>
          </div>
    
          </div>
          
        </div>
      </main>
    
    @endif
    
    <section class="w-full mt-20">
      <div class="w-navWidth mx-auto">
        <h2 class="capitalize py-10 text-3xl lg:text-center">recommended for you</h2>
  
        
      </div>
    </section>
    
    
</div>