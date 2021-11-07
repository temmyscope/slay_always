@section('title', 'Your Favorite Products')
@section('description', 'Welcome to StaySlay - Fashion. Your Favorite Products')
@section('keywords', 'Stay, Slay, Fashion, Favorites')


<div>
  <nav class="w-full mt-2">
    <ul class="w-navWidth flex mx-auto">
    <li class="underline p-3 font-bold text-xl">
        <a href="{!! route('welcome') !!}">Home</a>
    </li>
    <li class="p-3 text-gray-400 text-xl">
        <a>My Favorite</a>
    </li>
    </ul>
  </nav>

  @if ($favorites && empty($favorites))
    <main class="w-full mt-14">
      <div class="w-full">
        <h1 class="text-center uppercase text-3xl">Favorites</h1>
      </div>
      <div class="w-full text-center mt-20 mb-10">
        <h4 class="text-center  text-xl">You have no favorite items</h4>
        <a href="{!! route('welcome') !!}">
          <button class="lg:w-1/5 bg-black text-white lg:text-xl mt-7 rounded-md lg:p-3 p-1 hover:bg-slay">
            Continue shopping
          </button>
        </a>
      </div>
    </main>
  @else
    <main class="w-full mb-10">
      
      <div class="w-navWidth mx-auto">
          <div class="w-full flex justify-between mt-4 py-4 text-xl">
            <p>{!! $favorites->count() ?? 0 !!} items</p>
            <button wire:click="clear" type="button" class="underline">clear all</button>
          </div>
      </div>

      <div class="grid grid-cols-3 lg:grid-cols-5 mt-4 mb-2 ml-2 gap-4 w-full">
      @foreach ($favorites as $item)
        <livewire:product-card :product="$item->product" :wire:key="'faves-'.$item->product->id" >
      @endforeach
      </div>

    </main>
  
  @endif
</div>
