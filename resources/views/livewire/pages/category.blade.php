@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <!-- nav section -->
    <nav class="w-full mt-6">
      <ul class="w-navWidth flex mx-auto">
        <li class="underline p-3 font-bold text-xl">
          <a href="../index.html">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a href="/public/categories/shoes.html">Shoe</a>
        </li>
      </ul>
      <span class="w-full lg:text-center">
        <h1 class="text-4xl font-bold text-yellow-900 px-5">Shoes</h1>
      </span>
    </nav>
  
    <!-- Filtered -->
    <div class="w-full lg:text-center my-5 mx-2">
      <div class="w-navWidth mx-auto">
        <div id="filtered" class="filter w-40 justify-around py-2 cursor-pointer">
          <h3 class="text-left">
            Filtered  
          </h3>
          <p>
            <i class="fas fa-sliders-h"></i>
          </p>
        </div>
      </div>
    </div>
    <!-- -->

    <!-- side nav -->
    <main class="lg:w-navWidth w-full mx-auto flex md:gap-10">
      <div class="lg:w-1/5  side-nav w-3/4 overflow-scroll lg:overflow-hidden ">
        <!-- button will be displayed on medium to large screen -->
        <div class="w-auto flex justify-end md:justify-start">
          <div class="lg:block md:block  hidden">
            <button class="p-2 w-48 bg-bgSec text-gray-100 text-lg rounded-3xl focus:border-4 border-indigo-300 mb-3">
              clear (2)
            </button>
          </div>
          <div class="cursor-pointer close md:hidden p-2 md:p-0">
            <i class="far fa-window-close"></i>
          </div>
        </div>
        <div class="w-11/12 mx-auto">
    
            <!-- <div class=""> -->
              <!-- gender categories -->
          <h4 class="accord py-3 font-bold text-xl">Division</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" checked class="mr-1 inline-block relative top-0 w-4">
              <label for="">Women</label>
              </div>
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">Plus</label>
              </div>
          </div>
          <!-- categories section -->
          <h4 class="accord py-3 mt-5 font-bold text-xl">Categories</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">Matching sets (no of items)</label>
              </div>
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">Sweaters (no of items)</label>
              </div>
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">Vintage (no of items)</label>
              </div>
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">Knit top (no of items)</label>
              </div>
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">luxe (no of items)</label>
              </div>
          </div>
          <!-- sizes section -->
          <h4 class="accord py-3 mt-5 font-bold text-xl">size</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">XL ()</label>
              </div>
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">XS ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">XXL ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">L ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">L/XL ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">1X/2X ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">2X/1X ()</label>
              </div>
          </div>
    
          <!-- colors available -->
          <h4 class="accord py-3 mt-5 font-bold text-xl">colors</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input type="radio" name="radio" id="black" class="mr-1 inline-block relative top-0 w-4 border-none bg-black focus:ring-0 focus:outline-none">
              <label for="black">Black ()</label>
              </div>
            
              <div class="w-full py-1">
                <input type="radio" name="radio" id="green" class="mr-1 inline-block relative top-0 w-4 bg-green-600">
              <label for="green">Green ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="radio" name="radio" id="blue" class="mr-1 inline-block relative top-0 w-4 bg-blue-600">
              <label for="blue">Blue ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="radio" name="radio" id="red" class="mr-1 inline-block relative top-0 w-4 bg-red-500">
              <label for="red">Red ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="radio" name="radio" id="yellow" class="mr-1 inline-block relative top-0 w-4 bg-yellow-500">
              <label for="yellow">Yellow ()</label>
              </div>
    
              <div class="w-full py-1">
                <input type="radio" name="radio" id="brown" class="mr-1 inline-block relative top-0 w-4 bg-gray-500">
              <label for="brown">Gray ()</label>
              </div>
              <div class="w-full py-1">
                <input type="radio" name="radio" id="brown" class="mr-1 inline-block relative top-0 w-4 bg-white">
              <label for="brown">white ()</label>
              </div>
              <div class="w-full py-1">
                <input type="radio" name="radio" id="brown" class="mr-1 inline-block relative top-0 w-4 bg-purple-700">
              <label for="brown">purple ()</label>
              </div>
          </div>
    
          <!-- fabric section -->
          <h4 class="accord py-3 font-bold text-xl">Fabric</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">Denim</label>
              </div>
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
              <label for="">Lace</label>
              </div>
          </div>
          <!-- prices -->
          <h4 class="accord py-3 font-bold text-xl">Prices</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id=""  class="mr-1 inline-block relative top-0 w-4">
              <label for="" class="">&#8358;0 - 1000</label>
              </div>
            
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
                <label for="" class="">&#8358;1000 - 10000</label>
              </div>
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
                <label for="" class="">&#8358;10000 - 100,000</label>
              </div>
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
                <label for="" class="">&#8358;100,000 - 200,000</label>
              </div>
              <div class="w-full py-1">
                <input type="checkbox" name="" id="" class="mr-1 inline-block relative top-0 w-4">
                <label for="" class="">&#8358;1000 - 10000</label>
              </div>
          </div>
          <!-- hide btn on large screen -->
          <div class="flex justify-between py-3 w-full md:hidden">
            <button class="p-2 w-40  text-gray-100 text-lg rounded border-2 border-gray-200 hover:bg-bgSec">
              clear (2)
            </button>
            <button class="p-2 w-40 text-gray-100 text-lg rounded border-2 border-gray-200 hover:bg-bgSec">
              Apply
            </button>
          </div>
          <!-- ################## -->
        </div>
      </div>

      <!-- main cards will be displayed here-->
      <div class="w-full grid lg:grid-cols-4 gap-4 px-5 lg:px-0 md:grid-cols-2">

        <div class="w-full lg:max-h-80">
          <div class="relative shoe-container">
            <a href="#">
              <img src="{!! asset('assets/assets/slide1.PNG') !!}" alt="" class="w-full" onmouseover="changeImage(this)" onmouseout="returnImage(this)">
              <span id="heart" class="far fa-heart absolute top-1 text-white text-3xl right-2 block"></span>
              <!-- <span  class="fas fa-heart text-gray-300 absolute top-1 text-3xl right-2 hidden"></span> -->
              <div class="buttn-overlay absolute text-center p-2 bg-white text-red-500 font-bold hidden md:block">
                Buy me
              </div>
              <a href="" class="md:hidden">
                <span class="fas fa-shopping-bag absolute text-white bottom-3 right-2 text-3xl"></span>
              </a>
            </a>
          </div>
          
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

        </div>

        <div class="w-full lg:max-h-80">
          <div class="relative shoe-container">
            <a href="#">
              <img src="{!! asset('assets/assets/slide1.PNG') !!}" alt="" class="w-full">
              <span id="heart" class="far fa-heart absolute top-1 text-white text-3xl right-2 block"></span>
              <div class="buttn-overlay absolute text-center p-2 bg-white text-red-500 font-bold hidden md:block">
                Buy me
              </div>
              <a href="" class="md:hidden">
                <span class="fas fa-shopping-bag absolute text-white bottom-3 right-2 text-3xl"></span>
              </a>
            </a>
          </div>
          
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

        </div>


        <div class="w-full lg:max-h-80">
          <div class="relative shoe-container">
            <a href="#">
              <img src="{!! asset('assets/assets/slide1.PNG') !!}" alt="" class="w-full">
              <span id="heart" class="far fa-heart absolute top-1 text-white text-3xl right-2 block"></span>
              <div class="buttn-overlay absolute text-center p-2 bg-white text-red-500 font-bold hidden md:block">
                Buy me
              </div>
              <a href="" class="md:hidden">
                <span class="fas fa-shopping-bag absolute text-white bottom-3 right-2 text-3xl"></span>
              </a>
            </a>
          </div>
          
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

        </div>


        <div class="w-full lg:max-h-80">
          <div class="relative shoe-container">
            <a href="#">
              <img src="../assets/slide4.PNG" alt="" class="w-full">
              <span id="heart" class="far fa-heart absolute top-1 text-white text-3xl right-2 block"></span>
              <div class="buttn-overlay absolute text-center p-2 bg-white text-red-500 font-bold hidden md:block">
                Buy me
              </div>
              <a href="" class="md:hidden">
                <span class="fas fa-shopping-bag absolute text-white bottom-3 right-2 text-3xl"></span>
              </a>
            </a>
          </div>
          
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

        </div>


        
      </div>

    </main>
@endsection