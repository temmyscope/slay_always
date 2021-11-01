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
  <main class="w-full mt-14">
    <div class="w-navWidth mx-auto">
      <div class="text-center">
        <h1 class="capitalize text-3xl text-gray-700">recently viewed</h1>
      </div>
      <div class="w-full flex justify-between mt-7 py-4 text-xl">
        <p>7 items</p>
        <button type="button" class="underline">clear all</button>
      
      </div>
    </div>

    <!--- loop over products --->

  </main>
    
</div>
