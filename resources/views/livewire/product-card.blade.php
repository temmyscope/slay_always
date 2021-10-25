<div>

  <!-- <div class="relative w-full"> -->
  <div class="shadow-lg rounded-lg w-full">
    <a href="#">
      <div class="relative m-w-full max-h-full con">
        <div id="slide1" class="slide slide1 w-full">
          <img src="{!! $product->image->img_link !!}" alt="" class="w-full">
          <a wire:click="addTofavorite({!! $product->id !!})" id="heart" class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block"></a>
          <div class="over w-full">
          </div>
        </div>
      </div>
    </a>
  
    <div class="py-5 px-2">
      <p class="text-red-700 font-bold uppercase mb-3">30% off! no code needed prices as marked</p>
      <p class="mb-2 text-gray-500 font-bold">{!! $product->name !!}</p>
      <p class="font-bold mb-2"><span class="line-through text-gray-500">&#8358;{!! $product->price !!}</span>
        &nbsp; <span class="text-red-700">&#8358;{!! percentageDecrease($product->price, $dicountPercent) !!}</span></p>
      <span><!-- color variants: derive a loop from the metadata -->
        <input type="radio" name="radio" id="slide1"  class="bg-black check" checked>
        <input type="radio" name="radio" id="slide2" class="bg-red-900 check">
        <input type="radio" name="radio" id="slide3" class="bg-yellow-400 check">
        <input type="radio" name="radio" id="" class="bg-purple-700">
      </span>
    </div>
    <button wire:click="addToCart({!! $product->id !!})" class="bg-black chevron text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3" type="button">
      Add to bag
    </button>
  </div>
  <!-- </div> -->

</div>
