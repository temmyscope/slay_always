@section('title', 'Recent')
@section('description', 'Welcome to StaySlay - Fashion. Our Recent Page')
@section('keywords', 'Stay, Slay, Fashion,')

<div>

  <nav class="w-full mt-6">
    <ul class="w-navWidth flex mx-auto">
    <li class="underline p-3 font-bold text-xl">
        <a href="{!! route('welcome') !!}">Home</a>
    </li>
    <li class="p-3 text-gray-400 text-xl">
        <a>Recents</a>
    </li>
    </ul>
  </nav>
  <main class="w-full mt-2">
    <div class="w-navWidth mx-auto">
      <div class="text-center">
        <h1 class="capitalize text-3xl text-gray-700">recently viewed</h1>
      </div>
      <div class="w-full flex justify-between mt-7 py-4 text-xl">
        <p>{!! $recentCount !!} items</p>
        <button wire:click="clear" type="button" class="underline">clear all</button>
      
      </div>
    </div>

    @if ($recentCount > 0)
      @foreach ($products as $item)

      <!--- loop over products --->
          
      @endforeach
        
    @else
        
    <div class="w-full text-center mt-20 mb-10">
      <h4 class="text-center  text-xl">You have no recent items</h4>
      <a href="{!! route('welcome') !!}">
        <button class="lg:w-1/5 bg-black text-white lg:text-xl mt-7 rounded-md lg:p-3 p-1 hover:bg-slay">
          Continue shopping
        </button>
      </a>
    </div>
    @endif

  </main>
    
</div>
