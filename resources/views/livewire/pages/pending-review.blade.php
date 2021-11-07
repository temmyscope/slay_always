<div>

  <nav class="w-full">
    <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
      <ul class="flex">
        <li class="underline p-3 font-bold text-xl">
          <a href="">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a>Pending Product Reviews</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="w-full mt-16 mb-4 overflow-x-scroll lg:overflow-hidden flex">

    <div class="lg:w-3/4 mx-auto flex gap-6 min-w-full">

      @includeIf('layouts.sidebar', ['active' => 'review'])

      <div class="bg-white rounded-md lg:w-4/5 w-full flex-shrink-0">
        <div class="p-3 border-b-2 border-gray-200 border-solid w-full flex items-center">
          <a href="./profile.html" class="px-4 text-xl">
            <span class="fas fa-arrow-left"></span>
          </a>
          <h3 class="capitalize text-2xl">Pending Reviews</h3>
        </div>

        <div class=" p-3 w-full">
          @foreach ([0,1] as $item)
          <div class="border-2 border-solid border-gray-200 rounded-lg">
        
            <div class="p-2  grid grid-cols-9 gap-1">
              <div class="col-span-1 p-1 img-width">
                <img src="https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
              </div>
              <div class="col-span-7 leading-7">
                <p class="font-semibold capitalize">
                  Fashion Creative Watches Men Luxury Brand Digital LED Display 50M Waterpro
                </p>
                <p class="font-semibold text-gray-500">
                  order AK4767890
                </p>
                <p class="font-semibold capitalize text-white bg-green-300 w-20 p-1 rounded-lg">
                  Delivered
                </p>
                
                <p class="font-semibold text-gray-500">
                  Date
                </p>
              </div>
              <div class="col-span-1">
                <a href="{!! route('review-product', ['id' => 1 ]) !!}" class="font-bold capitalize text-slayText hover:bg-slay hover:text-gray-100 hover:opacity-75 p-2 rounded-lg">
                  Rate product
                </a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>

    </div>

  </main>

</div>
