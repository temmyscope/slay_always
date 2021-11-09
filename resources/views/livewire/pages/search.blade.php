@section('title', 'Categories')

<div>
    <!-- nav section -->
    <nav class="w-full mt-6">
      <ul class="w-navWidth flex mx-auto">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('welcome') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a>{!! ($isCategory)?'Category':'Search' !!}</a>
        </li>
      </ul>
      <span class="w-full lg:text-center">
        @if (!is_null($category))
        <h1 class="text-4xl font-bold text-yellow-900 px-5">
          {!! ($isCategory)? $category :'Search Results: "'.$category.'"' !!}
        </h1>
        @endif
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
          <div class="lg:block clear">
            <button wire:click="clearFilters" class="p-2 w-32 bg-bgSec text-gray-100 text-lg rounded-3xl focus:border-4 border-indigo-300 mb-3 hover:bg-slay">
              clear ({!! $this->filterCount() !!})
            </button>
          </div>
          <div class="close w-full">
            <span class="far fa-window-close text-gray-50 cursor-pointer float-right"></span>
          </div>
        </div>
        <div class="w-11/12 mx-auto">
    
            <!-- <div class=""> -->
              <!-- gender categories -->
          <h4 class="accord py-5 font-bold text-xl">Division</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input 
                  type="radio" name="" id="" wire:model="gender" 
                  class="mr-1 inline-block relative top-0 w-4"
                />
                <label for="">Women</label>
              </div>
          </div>
          <!-- categories section -->
          <h4 class="accord py-3 mt-5 font-bold text-xl mr-2">Fabrics</h4>
            
          <div id="side-panel" class="block py-4">
            
            <div class="w-full py-1">
              <input 
                type="radio" value="sweater" id="" 
                class="mr-1 inline-block relative top-0 w-4" wire:model="category"
              />
              <label for="">Sweaters</label>
            </div>
            <div class="w-full py-1">
              <input 
                value="vintage" type="radio" name="" 
                id="" class="mr-1 inline-block relative top-0 w-4" wire:model="category"
              />
              <label for="">Vintage</label>
            </div>
            <div class="w-full py-1">
              <input 
                value="knit top" type="radio" name="" 
                id="" class="mr-1 inline-block relative top-0 w-4" wire:model="category"
              />
              <label for="">Knit top</label>
            </div>
            
            <div class="w-full py-1">
              <input 
                value="denim" type="radio" name="" 
                id="" class="mr-1 inline-block relative top-0 w-4" wire:model="category"
              />
              <label for="">Denim</label>
            </div>
          
            <div class="w-full py-1">
              <input 
                value="lace" type="radio" name="" id="" 
                class="mr-1 inline-block relative top-0 w-4" wire:model="category"
              />
              <label for="">Lace</label>
            </div>
  
          </div>
          <!-- sizes section -->
          <h4 class="accord py-3 mt-5 font-bold text-xl">size</h4>
            
          <div id="side-panel" class="block py-4">
            
              <div class="w-full py-1">
                <input 
                  value="XL" type="radio" wire:model="size"
                  class="mr-1 inline-block relative top-0 w-4" name="" id=""
                />
                <label for="">XL</label>
              </div>
            
              <div class="w-full py-1">
                <input 
                  value="XS" type="radio" name="" id="" 
                  class="mr-1 inline-block relative top-0 w-4" wire:model="size"
                />
                <label for="">XS</label>
              </div>
    
              <div class="w-full py-1">
                <input 
                  value="XXL" type="radio" name="" id="" 
                  class="mr-1 inline-block relative top-0 w-4" wire:model="size"
                />
                <label for="">XXL</label>
              </div>
    
              <div class="w-full py-1">
                <input 
                  value="L" type="radio" name="" id="" 
                  class="mr-1 inline-block relative top-0 w-4" wire:model="size"
                />
                <label for="">L</label>
              </div>
              
              <div class="w-full py-1">
                <input 
                  value="S" type="radio" name="" id="" 
                  class="mr-1 inline-block relative top-0 w-4" wire:model="size"
                />
                <label for="">S</label>
              </div>
          </div>
    
          <!-- colors available -->
          <h4 class="accord py-3 mt-5 font-bold text-xl">colors</h4>
            
          <div id="side-panel" class="block py-4">
          
            <div class="w-full py-1">
              <input 
                value="green" type="radio" id="green" 
                class="mr-1 inline-block relative top-0 w-4 bg-green-600" wire:model="color"
              />
              <label for="green">Green</label>
            </div>
          
            <div class="w-full py-1">
              <input 
                value="blue" type="radio" id="blue" 
                class="mr-1 inline-block relative top-0 w-4 bg-blue-600" wire:model="color"
              />
              <label for="blue">Blue</label>
            </div>
          
            <div class="w-full py-1">
              <input 
                value="red" type="radio" id="red" 
                class="mr-1 inline-block relative top-0 w-4 bg-red-600" wire:model="color"
              />
              <label for="red">Red</label>
            </div>
          
            <div class="w-full py-1">
              <input 
                value="black" type="radio" id="black"  wire:model="color"
                class="mr-1 inline-block relative top-0 w-4" style=":checked: background-color: black;"
              />
              <label for="black">Black</label>
            </div>

          </div>

          <!-- prices -->
          <h4 class="accord py-3 font-bold text-xl">Prices</h4>
            
          <div id="side-panel" class="block py-4">
            
            
              <div class="w-full py-1">
                <input 
                  value="1000:10000" type="radio" name="" wire:model="price"
                  id="" class="mr-1 inline-block relative top-0 w-4"
                /> <label for="" class="">&#8358;1000 - 10,000</label>
              </div>

              <div class="w-full py-1">
                <input 
                  value="10000:100000" type="radio" name="" 
                  id="" class="mr-1 inline-block relative top-0 w-4" wire:model="price"
                /> <label for="" class="">&#8358;10,000 - 100,000</label>
              </div>
              
              <div class="w-full py-1">
                <input 
                  value="100000:1000000" type="radio" name="" 
                  id="" class="mr-1 inline-block relative top-0 w-4" wire:model="price"
                /> <label for="" class="">&#8358;100,000 - above</label>
              </div>
              
          </div>
          <!-- hide btn on large screen -->
          <div class="flex justify-between py-3 w-full md:hidden">
            <button wire:click="clearFilters" 
              class="p-2 w-40 text-gray-100 text-lg rounded border-2 border-gray-200 hover:bg-bgSec"
            >
              clear ({!! $this->filterCount() !!})
            </button>
            <button class="p-2 w-40 text-gray-100 text-lg rounded border-2 border-gray-200 hover:bg-bgSec">
              Apply
            </button>
          </div>
          <!-- ################## -->
        </div>
      </div>

      <!-- main cards will be displayed here-->

      <div class="grid lg:grid-cols-4 mt-4 gap-3 mb-6 w-full">

          @if ( !empty($searchResult) )

            @if ($filtered === true)
              @if (!empty($filteredResult))
                @foreach ($filtered as $index => $product)
                  <livewire:product-card :product="$product" :wire:key="'filtered-'.$index.'-'.$product->id" >
                @endforeach
              @endif

            @else

              @foreach ($searchResult as $index => $product)
                <livewire:product-card :product="$product" :wire:key="'searched-'.$index.'-'.$product->id" >
              @endforeach

            @endif

          @else

          @endif

      </div>

    </main>

</div>