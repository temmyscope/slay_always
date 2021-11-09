@section('title', 'Our Products')
@section('description', 'Welcome to StaySlay - Fashion. Our Products')
@section('keywords', 'Stay, Slay, Fashion, Wears')

<div>
  <!--  -->
  
    <nav class="mt-3">
        <ul class="w-navWidth flex mx-auto">
            <li class="underline p-3 font-bold text-xl">
                <a href="{!! route('welcome') !!}">Home</a>
            </li>
            <li class="p-3 text-gray-400 text-xl">
                <a>Product</a>
            </li>
        </ul>
    </nav>

    <main class="w-full mt-10 h-auto">
        <div class="lg:w-4/6 w-navWidth mx-auto  lg:grid  lg:grid-cols-6 gap-4">
        
            <div id="imagesHeader" class="lg:block hidden">
          
                @foreach ($product->images as $key => $image)
                    <div class="mb-4 image-btn {!! ($key === 0) ? 'active-images' : '' !!} w-3/4 float-right">
                        <label for="" class="cursor-pointer" onclick="currentImage({!! $key!!})">
                            <img src="{!! cdnizeURL($item->src) !!}" alt="{!! $product->name !!}" class="h-full">
                        </label>
                    </div>
                @endforeach
            
            </div>
            @php
                $promotion = App\Models\Promotion::currentlyRunning();
            @endphp

            <div class="col-span-3">
                <div class="relative">
                    @foreach ($product->images as $image)
                        <div class="imagex">
                            <img src="{!! cdnizeURL($image->src ?? '') !!}" alt="{!! $product->name !!} image" class="h-full">
                        </div>
                    @endforeach
                    <span class="fas fa-chevron-left absolute lg:hidden block left-6 py-2 px-3 bg-slay cursor-pointer nextt text-gray-100 text-2xl" onclick="plusImages(-1)"></span>
                    <span class="fas fa-chevron-right absolute lg:hidden block -right-4 py-2 px-3 bg-slay cursor-pointer nextt text-gray-100 text-2xl" onclick="plusImages(1)"></span>
                </div>
            </div>

            <div class="col-span-2 p-1 text-gray-600 h-auto">

                <div class="flex w-full justify-between">
                    <div class="w-4/5">
                        <p class="text-red-700 text-sm uppercase font-bold">{!! $promotion?->discount ?? 0 !!}% off! no code needed &#128293; price as marked</p>
                    </div>
                    <a href="">
                        <span class="fas fa-share-alt"></span>  share
                    </a>
                </div>

                <div class="mt-4">
                    <h2>
                        {!! $product->name !!}
                    </h2>
                    <div class="flex py-3">
                        <span class="pr-3 cursor-pointer">
                            @php
                                $rating = $product->reviews->avg('rating');
                                $intRate = floor($rating);
                                $decRate = $rating-$intRate;
                                $emptyRates = 5-ceil($rating);
                            @endphp

                            @for ($i = 0; $i < $intRate; $i++)
                                <i class="fas fa-star"></i>
                            @endfor

                            @if ($decRate > 0)
                                <i class="fas fa-star-half-alt"></i>
                            @endif

                            @if ($emptyRates > 0)
                                @for ($i = 0; $i < $emptyRates; $i++)
                                    <i class="far fa-star"></i>
                                @endfor
                            @endif

                        </span>

                        <p class="cursor-pointer underline">{!! $product->reviews->count() !!} Reviews</p>
                    </div>
                    <div class="py-2">
                        <p class="font-bold mb-2">
                            <span class="line-through text-gray-500">
                                &#8358;{!! number_format($product->price) !!}
                            </span>&nbsp; 
                            <span class="text-red-700">
                            {!! '&#8358;'.number_format( percentageDecrease($product->price, $promotion?->discount ?? 0) ) !!}
                            </span></p>
                        <p>Color Blue</p>
                    </div>

                    <div class="mt-8">
                        <div class="flex justify-between">
                        <p>size: </p>
                        <div>
                            <p id="openModal" class="cursor-pointer text-gray-900 underline font-bold">size chart</p>
                        </div>
                    </div>

                    <div class="mt-6 inline-block">
                      <!-- <div> -->
                        <input type="radio" name="sizing" id="size1" class="hidden">
                        <input type="radio" name="sizing" id="size2" class="hidden">
                        <input type="radio" name="sizing" id="size3" class="hidden">
                        <input type="radio" name="sizing" id="size4" class="hidden">
                        <input type="radio" name="sizing" id="size5" class="hidden">
        
                        <label for="size1" class="w-10 inline-block p-1 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-md font-bold py-1 mr-1 chart1 m-1">XXL</label>
                        <label for="size1" class="w-10 inline-block p-1 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-md font-bold py-1 mr-1 chart2 m-1">XL</label>
                        <label for="size1" class="w-10 inline-block p-1 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-md font-bold py-1 mr-1 chart3 m-1">L</label>
                        <label for="size1" class="w-10 inline-block p-1 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-md font-bold py-1 mr-1 chart4 m-1">S</label>
                      <!-- </div> -->
                    </div>

                    <div class="flex justify-between py-4">
                        <button class="bg-black text-white active:bg-purple-600 font-bold uppercase text-base w-4/5 hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3 hover:bg-slay hover:text-gray-100 " type="button">
                            Add to bag
                        </button>
                        <button class="border-2 border-solid border-gray-500 p-1 px-2">
                            <span id="likeCounter" class="far fa-heart top-1 text-slayText text-3xl right-2 block" onclick="toggleHeart(this)"></span>
                        </button>
                    </div>

                    <div class="flex w-full justify-between bg-gray-200 p-4 rounded-lg">
                        <span class="flex">
                            <p class="fas fa-shipping-fast"> <span class="text-gray-500 font-normal">ships fast</span></p>
                        </span>
                        <span>
                            <p class="far fa-comments"> <span class="text-gray-500">24/7 Customer service</span></p>
                        </span>
                    </div>

                    <div class="mt-7">
                        <h4 class="uppercase py-4 text-gray-800 font-bold product">Product details</h4>
                        <ul class="capitalize list-disc px-4 text-gray-800 product-details block">
                            <li>Available in blue</li>
                            <li>4 piece halloween custume set</li>
                            <li>style with black heeels for the perfect look!</li>
                        </ul>
                        <div>
                            <h4 class="uppercase py-4 text-gray-800 font-bold shipping">returns: store credit</h4>
                            <div class="shipping-details">
                            <p class="py-3">
                                With limited exceptions, valid returns are refunded in the form of store credit. 
                                Damaged/defective items will be subject to an exchange if in stock.
                            </p>
                            <p class="py-3">
                                All store credit, refunds, and/or exchanges that are due will be issued within 3 to 5 business days after the return is processed.
                            </p>
                            <p class="py-3">
                                All final sale items are marked as such and cannot be returned for store credit.
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    @include('layouts.size-chart')

    <!-- review page -->
    <section class="w-full mt-14 mb-4">
        @if($product->reviews && isset($product->reviews[0]))
        <h2 class="text-center text-3xl py-8 font-bold capitalize">What customers are saying</h2>
      
        <div class="lg:w-1/2 w-4/5 px-1 mx-auto py-2 grid lg:grid-cols-2 gap-3 rounded-lg bg-white border-4 border-solid border-gray-200">
        
            @foreach ($product->reviews as $review)
                <div class=" ">
                    <div class="w-full">

                        <div class="">
                            <span class="pr-3 cursor-pointer ">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <span class="fas fa-star text-1xl"></span>
                                @endfor
                            </span>
                        </div>
            
                        <div class="mt-3">
                            <p>{!! $review->user->name !!}</p>
                            <p>{!! date("F j, Y", strtotime($review->created_at)) !!}</p>
                        </div>
                    </div>
        
                </div>
                <!-- comment -->
                <div class="">
                    <div class="mt-1">
                        <p>Size purchased: {!! $review->size !!}</p>
                        <P>How did it fit: {!! $review->fitting !!}</P>
                        <p>Comment: {{ $review->review }} </p>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

    </section>
    

</div>