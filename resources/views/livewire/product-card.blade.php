<div class="shadow-lg rounded-lg w-full"  style="">
  <a href="{!! route('user-product', ['id' => $product->id ]) !!}">
    <!--<img 
      class="w-full" alt="{!! $product->name !!} Image"
      src="{!! cdnizeURL($product->images[0]->src ?? '') !!}"
    />-->
    <div class="relative m-w-full max-h-full con">
      <div id="slide1" class="slide slide1 w-full">
        <img src="https://images.pexels.com/photos/1689731/pexels-photo-1689731.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
          alt="" class="w-full"  style="object-fit:contain;"
        />
        <button id="heart" wire:click.prevent="addToFavorite({!! $product->id !!})"
        class="{!! (App\Models\Product::liked($product->id))? 'fa fa-heart':'far fa-heart' !!} absolute top-1 text-yellow-800 text-3xl right-2 block">
        </button>
      </div>
     
    </div>
  </a>
  <div class="py-2 px-2 mb-1">
    @if (!is_null($dicountPercent))
    <p class="text-red-700 font-bold uppercase mb-2">{!! $dicountPercent !!}% off! no code needed prices as marked</p>
    @endif
    <p class="mb-1 text-gray-500 font-bold">{!! $product->name !!}</p>
    <p class="font-bold mb-1">
      @if (!is_null($dicountPercent))
      <span class="line-through text-gray-500">&#8358;{!! number_format($product->price) !!}&nbsp;</span>
      @endif
      <span class="text-red-700">
        &#8358;{!! number_format(percentageDecrease($product->price, $dicountPercent ?? 0)) !!}
      </span>
    </p>
    <span class="p-2">
      @if (!empty($colors))
        @foreach ($colors as $index => $item)
        <input 
          type="radio" name="slide" id="slide{!!$product->id.'-'.$item!!}" 
          class="hidden" {!! ($index==0)?'checked':'' !!} wire:model="selectedColor"
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
      @endif
    </span>
  </div>
  <button
    wire:click="addToCart({!! $product->id !!})"
    class="bg-black text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3 font-bold"
  >
    <span wire:loading.remove wire:target="addToCart">Add to bag <i class="fas fa-shopping-bag"></i></span>
    <span wire:loading wire:target="addToCart">
      <i class="fa fa-spinner faa-spin animated"></i>
    </span>
  </button>
</div>

