@section('title', 'Checkout')
@section('description', 'Welcome to StaySlay - Fashion. Checkout')
@section('keywords', 'Stay, Slay, Fashion')

<div>
    <nav class="w-full">
        <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
            <ul class="flex">
                <li class="underline p-3 font-bold text-xl">
                    <a href="{!! route('home') !!}">Home</a>
                </li>
                <li class="p-3 text-gray-400 text-xl">
                    <a>Profile</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="w-full mt-16 mb-4 overflow-x-scroll lg:overflow-hidden flex">
        <div class="lg:w-3/4 mx-auto flex gap-6 min-w-full">
  
            @includeIf('layouts.sidebar', ['active' => 'orders'])

            <div class="bg-white rounded-md min-w-profie flex-shrink-0">
                <div class="p-2 border-b-2 border-gray-200 border-solid w-full flex items-center justify-between"
                >
                    <a class="cursor-pointer px-2 text-xl mr-2" onclick="window.history.back();" 
                        style="display:flex;flex-direction: row;justify-content:space-between;"
                    >
                        <span class="fas fa-arrow-left mr-4"></span>
                        <h5 class="capitalize text-xl">Order details</h5>
                    </a>
                    <div class="p-1 py-3 px-4">
                        <p class="font-semibold capitalize text-white bg-green-300 w-20 p-1 rounded-lg">
                          {!! ucfirst($order->delivery_status) !!}
                        </p>
                    </div>
                </div>

                <div class="p-3 w-full">
                    <div>
                        <h2>Order ID: {!! strtolower($order->txn_id) !!}</h2>
                        <p>{!! count($products) !!} items</p>
                        <p>Placed: {!! date('g:i a, l M jS, Y', strtotime($order->created_at)) !!}</p>
                        <p>Total: &#8358;{!! number_format($order->total, 2) !!}</p>
                    </div>

                    <div class="my-7 border-2 border-solid border-gray-200 rounded-lg w-full py-2 p-1">
                        <h2 class="font-bold text-xl">Items in cart</h2>
                    </div>
      
                    <div class="border-2 border-solid border-gray-200 rounded-lg">
                        
                        @foreach ($products as $item)
                        <div class="p-3  grid grid-cols-9 gap-3 w-full">
                            <div class="col-span-1 p-1 img-width">
                                <img src="https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" class="">
                            </div>
                            <div class="col-span-8 leading-7">

                                <p class="font-semibold capitalize">
                                    {!! $item['name'] !!}
                                </p>
                                <p class="font-semibold text-gray-500">
                                    Qty: {!! $item['qty'] !!}
                                </p>
                                <p class="font-semibold text-gray-500">
                                    Size:  {!! $item['size'] !!}
                                </p>
                                <p class="font-semibold text-gray-500">
                                    Amount:  &#8358;{!! number_format($item['price']) !!}
                                </p>

                            </div>
                        </div>
                        @endforeach
                    
                    </div>
      
                    <div class="grid grid-cols-2 gap-6 mt-5">
                        <div class="border-2 border-solid border-gray-200 rounded-lg w-full">
                            <div class="p-1 py-2 border-b-2 border-gray-200 border-solid">
                                <h3 class="capitalize text-xl">payment information</h3>
                                
                            </div>

                            <div class="p-3">
                                <p class="font-semibold">Payment Method:</p>
                                <p class="text-gray-500">Paystack</p>
                                <h2 class="mt-5">Payment Details:</h2>
                                <p class="text-gray-500">
                                    VAT: &#8358;
                                    {!! number_format(($order->total*(7.5/100))) !!}
                                </p>
                                <p class="text-gray-500">
                                    shipping fee: &#8358;{!! number_format($metadata['taxesApplied']['shipping']) !!}
                                </p>
                            </div>

                        </div>

                        <div class="border-2 border-solid border-gray-200 rounded-lg w-full">
                            <div class="p-1 py-2 border-b-2 border-gray-200 border-solid">
                                <h3 class="capitalize text-xl">delivery information</h3>
                                
                            </div>
                            <div class="p-3">
                                <p class="font-semibold">Delivery Method:</p>
                                <p class="text-gray-500">Home delivery</p>
                                <p class="mt-8">Pick-up station address:</p>
                            </div>
                        </div>
                    </div>
                  
                </div> 
                
            </div>
        <div>
    </main>
</div>