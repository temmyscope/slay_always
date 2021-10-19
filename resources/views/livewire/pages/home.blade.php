@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- video background -->
  <section class="w-full bg-gray-900 relative overflow-hidden flex justify-center items-center lg:h-vid h-smVid">
    <div class="z-10 text-white relative p-5 bg-bgPry rounded-md bg-opacity-50 text-2xl text-center">
      <a href="">
        <h1 class="font-bold lg:text-3xl">Welcome To Stay Slay Fashion</h1>
      </a>
    </div>
    <video autoplay loop muted class=" w-full absolute z-10 h-full">
      <source src="{{asset('assets/assets/sss.mp4')}}" type="video/mp4">
      your browswer does not support this type of video
    </video>
  </section>

  <!-- categories section -->
  <main class="w-full my-8">
    <div class="w-navWidth mx-auto">
      <h1 class="text-center text-4xl font-bold">Categories</h1>

      <div class="grid grid-cols-2 lg:grid-cols-4 my-5 gap-4  w-full">
        <div class=" w-full rounded-sm text-center relative">
          <a href="./categories/shoes.html">
            <img class="" src="{{asset('assets/assets/edited1.PNG')}}" alt="" style=" width: 100%;">
            <h3 class="text-black font-medium text-3xl py-5 underline">
              Shoes
            </h3>
            <div class="centered font-extrabold">
              <h1 class="text-4xl">Suede shoe</h1>
              <p>Starting at</p>
              <p class="text-4xl">&#8358;15,000</p>
            </div>
          </a>
        </div>

        <div class=" max-w-full rounded-sm text-center relative">
          <a href="">
            <img class="h-full" src="{{asset('assets/assets/edited2.PNG')}}" alt="" style=" width: 100%;" >
            <h3 class="text-black font-medium text-3xl py-5 underline">Sweater</h3>
            <div class="centered font-extrabold">
              <h1 class="text-4xl">Sweaters & Coats</h1>
              <p>Starting at</p>
              <p class="text-4xl">&#8358;15,000</p>
            </div>
          </a>
        </div>

        <div class="max-w-full rounded-sm text-center relative">
          <a href="">
            <img src="{{asset('assets/assets/edited3.PNG')}}" alt="" style=" width: 100%;">
            <h3 class="text-black font-medium text-3xl py-5 underline">Dress</h3>
            <div class="centered font-extrabold">
              <h1 class="text-4xl">Ladies Dress</h1>
              <p>Starting at</p>
              <p class="text-4xl">&#8358;15,000</p>
            </div>
          </a>
        </div>

        <div class="max-w-full rounded-sm text-center relative">
          <a href="">
            <img src="{{asset('assets/assets/edited4.PNG')}}" alt="" style=" width: 100%;">
            <h3 class="text-black font-medium text-3xl py-5 underline">Panties</h3>
            <div class="centered font-extrabold">
              <h1 class="text-4xl">Panties & Skirts</h1>
              <p>Starting at</p>
              <p class="text-4xl">&#8358;15,000</p>
            </div>
          </a>
        </div>

      </div>
    </div>
  </main>

  <!-- section for gram shopping -->
  <div class="w-full mt-5">
    <div class="w-navWidth mx-auto text-center lg:text-4xl font-extrabold p-3 text-2xl">
      <h1>Our 'gram<i class="fab fa-instagram gram"></i> Shopping</h1>
    </div>
    <div class="grid grid-cols-4 my-5 gap-4  w-full ">

      <div class=" shadow-md w-full rounded-sm text-center relative cont">
        <a href="#" class="">
          <img class="" src="{{asset('assets/assets/gram1.PNG')}}" alt="" style=" width: 100%;">
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img class="h-full" src="{{asset('assets/assets/gram2.PNG')}}" alt="" style=" width: 100%;" >
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img src="{{asset('assets/assets/gram3.PNG')}}" alt="" style=" width: 100%;">
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img src="{{asset('assets/assets/gram4.PNG')}}" alt="" style=" width: 100%;">
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img src="{{asset('assets/assets/gram4.PNG')}}" alt="" style=" width: 100%;">
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img src="{{asset('assets/assets/gram3.PNG')}}" alt="" style=" width: 100%;">
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img class="h-full" src="{{asset('assets/assets/gram2.PNG')}}" alt="" style=" width: 100%;" >
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

      <div class="shadow-md w-full rounded-sm text-center relative cont">
        <a href="#" class="">
          <img class="" src="{{asset('assets/assets/gram1.PNG')}}" alt="" style=" width: 100%;">
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <button class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1">Shop Here</button>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>

  <!-- card images in slide -->
  <div class="w-full my-14">
    <div class="w-navWidth mx-auto">
      <h1 class="text-3xl text-center font-bold my-9">Customer Favourites</h1>
      
      <div class="grid grid-cols-3 lg:grid-cols-5 gap-4 w-full">

        <!-- <div class="relative w-full"> -->
          <div class="shadow-lg rounded-lg w-full">
            <a href="#">
              <div class="relative m-w-full max-h-full con">
                <div id="slide1" class="slide slide1 w-full">
                  <img src="{!! asset('assets/assets/slide1.PNG') !!}" alt="" class="w-full">
                  <span id="heart" class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block"></span>
                  <div class="over w-full">
                  </div>
                </div>
              </div>
            </a>

            <div class="py-5 px-2">
              <p class="text-red-700 font-bold uppercase mb-3">30% off! no code needed prices as marked</p>
              <p class="mb-2 text-gray-500 font-bold">Spree dress black</p>
              <p class="font-bold mb-2"><span class="line-through text-gray-500">&#8358;30,000</span>
                &nbsp; <span class="text-red-700">&#8358;25,000</span></p>
              <span>
                <input type="radio" name="radio" id="slide1"  class="bg-black check" checked>
                <input type="radio" name="radio" id="slide2" class="bg-red-900 check">
                <input type="radio" name="radio" id="slide3" class="bg-yellow-400 check">
                <input type="radio" name="radio" id="" class="bg-purple-700">
              </span>
            </div>
            <button class="bg-black chevron text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3" type="button">
              Add to bag
            </button>
          </div>

          <div class="shadow-lg rounded-lg w-full relative">
            <a href="#">
              <img src="{!! asset('assets/assets/slide2.PNG') !!}" alt="" class="w-full">
              <span id="heart" class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block"></span>
            </a>
            <div class="py-5 px-2">
              <p class="text-red-700 font-bold uppercase mb-3">30% off! no code needed prices as marked</p>
              <p class="mb-2 text-gray-500 font-bold">Spree dress black</p>
              <p class="font-bold mb-2"><span class="line-through text-gray-500">&#8358;30,000</span>
                &nbsp; <span class="text-red-700">&#8358;25,000</span></p>
              <span>
                <input type="radio" name="radio" id="" class="bg-black">
                <input type="radio" name="radio" id="" class="bg-red-900">
                <input type="radio" name="radio" id="" class="bg-pink-600">
              </span>
            </div>
            <button class="bg-black chevron text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3" type="button">
              Add to bag
            </button>
          </div>

          <div class="shadow-lg rounded-lg w-full relative">
            <a href="#">
              <img src="{!! asset('assets/assets/slide3.PNG') !!}" alt="" class="w-full">
              <span id="heart" class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block"></span>
            </a>
            <div class="py-5 px-2">
              <p class="text-red-700 font-bold uppercase mb-3">30% off! no code needed prices as marked</p>
              <p class="mb-2 text-gray-500 font-bold">Spree dress black</p>
              <p class="font-bold mb-2"><span class="line-through text-gray-500">&#8358;30,000</span>
                &nbsp; <span class="text-red-700">&#8358;25,000</span></p>
              <span>
                <input type="radio" name="radio" id="" class="bg-black">
                <input type="radio" name="radio" id="" class="bg-yellow-400">
                <input type="radio" name="radio" id="" class="bg-blue-700">
              </span>
            </div>
            <button class="bg-black chevron text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3" type="button">
              Add to bag
            </button>
          </div>

          <div class="shadow-lg rounded-lg w-full relative">
            <a href="#">
              <img src="{!! asset('assets/assets/slide4.PNG') !!}" alt="" class="w-full">
              <span id="heart" wire:model="like($id)" class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block"></span>
            </a>
            <div class="py-5 px-2">
              <p class="text-red-700 font-bold uppercase mb-3">30% off! no code needed prices as marked</p>
              <p class="mb-2 text-gray-500 font-bold">Spree dress black</p>
              <p class="font-bold mb-2"><span class="line-through text-gray-500">&#8358;30,000</span>
                &nbsp; <span class="text-red-700">&#8358;25,000</span></p>
              <span>
                <input type="radio" name="radio" id="" class="bg-black">
                <input type="radio" name="radio" id="" class="bg-green-900">
                <input type="radio" name="radio" id="" class="bg-white">

              </span>
            </div>
            <button class="bg-black chevron text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3" type="button">
              Add to bag
            </button>
          </div>

          <div class="shadow-lg rounded w-full relative">
            <a href="#">
              <img src="{!! asset('assets/assets/slide5.PNG') !!}" alt="" class="w-full">
              <span id="heart" class="far fa-heart absolute top-1 text-yellow-800 text-3xl right-2 block"></span>
            </a>
            <div class="py-5 px-2">
              <p class="text-red-700 font-bold uppercase mb-3">30% off! no code needed prices as marked</p>
              <p class="mb-2 text-gray-500 font-bold">Spree dress black</p>
              <p class="font-bold mb-2"><span class="line-through text-gray-500">&#8358;30,000</span>
                &nbsp; <span class="text-red-700">&#8358;25,000</span></p>
              <span>
                <input type="radio" name="radio" id="" class="bg-black">
                <input type="radio" name="radio" id="" class="bg-red-900">
                <input type="radio" name="radio" id="" class="bg-gray-400">
              </span>
            </div>
            <button class="bg-black chevron text-white active:bg-purple-600 font-bold uppercase text-base w-full hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 py-3" type="button">
              Add to bag
            </button>
          </div>
        <!-- </div> -->

      </div>
    </div>
  </div>

@endsection