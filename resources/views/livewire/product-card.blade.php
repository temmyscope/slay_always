<div>

  <!-- <div class="relative w-full"> -->
  <div class="shadow-lg rounded-lg w-full">
    <a href="#">
      <div class="relative m-w-full max-h-full con">
        <div id="slide1" class="slide slide1 w-full">
          <img src="{!! cdnizeURL($product->images[0]->src) !!}" alt="{!! $product->name !!} Image" class="w-full">
          <a 
            wire:click="addTofavorite({!! $product->id !!})" id="heart" 
            class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block heart"
          ></a>
          <div class="over w-full">
          </div>
        </div>
      </div>
    </a>
  
    <div class="py-5 px-2">
      @if (!is_null($dicountPercent))
      <p class="text-red-700 font-bold uppercase mb-3">{!! $dicountPercent !!}% off! prices as marked</p>
      @endif
      <p class="mb-2 text-gray-500 font-bold">{!! $product->name !!}</p>
      <p class="font-bold mb-2">
        @if (!is_null($dicountPercent))
        <span class="line-through text-gray-500">&#8358;{!! $product->price !!}</span>
        @endif

        &nbsp; <span class="text-red-700">&#8358;{!! percentageDecrease($product->price, $dicountPercent) !!}</span>
      </p>
      <span><!-- color variants: derive a loop from the metadata -->
        @foreach ($color as $index => $item)
        <input 
          type="radio" name="radio" id="slide1"  class="check" 
          style="background-color: {!! $item !!}" {!! ($index === 0)? 'checked' : '' !!}
        />
        @endforeach
      </span>
    </div>
    <button wire:click="addToCart({!! $product->id !!})" class="buttn-overlay absolute text-center p-2 bg-slay text-white font-bold hidden md:block">
      Add to bag
    </button>
    <a wire:click="addToCart({!! $product->id !!})" class="md:hidden">
      <span class="fas fa-shopping-bag absolute text-slayText bottom-3 right-2 text-3xl"></span>
    </a>
  </div>
  <!-- </div> -->

</div>
