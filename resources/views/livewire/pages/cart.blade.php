@extends('layouts.app')

@section('title', 'Cart')

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


      <main class="w-full mt-10">
        <div class="w-4/5 mx-auto">
          <div class="w-full">
            <h1 class="text-center uppercase text-3xl">shopping bag</h1>
          </div>
          @if (empty($cart))
            <div class="w-full text-center mt-24">
                <h4 class="text-center  text-xl">Your shopping bag is empty</h4>
                <a href="{!! route('welocme') !!}">
                <button class=" lg:w-1/5 bg-black text-white lg:text-xl mt-7 rounded-md lg:p-3 p-1 hover:bg-slay">Continue shopping</button>
                </a>
            </div>
          @else
              
          
          @endif
          
        </div>
      </main>
    
      <section class="w-full mt-20">
        <div class="w-navWidth mx-auto">
          <h2 class="capitalize py-10 text-3xl lg:text-center">recommended for you</h2>
    
          
        </div>
      </section>
    
    
</div>