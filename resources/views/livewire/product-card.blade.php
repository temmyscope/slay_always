<div class="shadow w-full relative">
  <a href="{!! route('user-product', ['id' => $product->id ]) !!}">
    <!--<img 
      class="w-full" alt="{!! $product->name !!} Image"
      src="{!! cdnizeURL($product->images[0]->src ?? '') !!}"
    />-->
    <img src="https://images.pexels.com/photos/1689731/pexels-photo-1689731.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
      alt="" class="w-full"
    />
            
    <button id="heart" wire:click.prevent="addToFavorite({!! $product->id !!})"
    class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block {!! ($product->liked($product->id))? 'heart':'' !!}">
    </button>
  </a>
  <div class="py-5 px-2">
    @if (!is_null($dicountPercent))
    <p class="text-red-700 font-bold uppercase mb-3">{!! $dicountPercent !!}% off! no code needed prices as marked</p>
    @endif
    <p class="mb-2 text-gray-500 font-bold">{!! $product->name !!}</p>
    <p class="font-bold mb-2">
      @if (!is_null($dicountPercent))
      <span class="line-through text-gray-500">&#8358;{!! number_format($product->price) !!}&nbsp;</span>
      @endif
      <span class="text-red-700">
        &#8358;{!! number_format(percentageDecrease($product->price, $dicountPercent ?? 0)) !!}
      </span>
    </p>
    <span>
      @if (!empty($colors))
        @foreach ($colors as $index => $item)
        <input 
          type="radio" name="radio"
          class="check bg-{!! strtolower($item) !!}" {!! ($index === 0)? 'checked' : '' !!}
        />
        @endforeach
      @endif
    </span>
  </div>
  <button wire:click="addToCart({!! $product->id !!})"
  class="bg-black chevron text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3 font-bold hidden md:block"
  >Add to bag
  </button>
  <a wire:click="addToCart({!! $product->id !!})" class="md:hidden">
    <span class="fas fa-shopping-bag absolute text-slayText bottom-3 right-2 text-3xl"></span>
  </a>
</div>

