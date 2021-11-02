<div>
    <nav class="w-full">
        <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
            <ul class="flex">
                <li class="underline p-3 font-bold text-xl">
                    <a href="{!! route('home') !!}">Home</a>
                </li>
                <li class="p-3 text-gray-400 text-xl">
                    <a>Profile</a>
                </li>
            </ul>
    
            <div class="flex items-center p-1">
                <p class="px-2 text-2xl">Hello</p>
                <div class="py-4 px-4 rounded-full bg-bgSec text-gray-200 text-center">
                <p class="uppercase text-2xl">sd</p>
                </div>
            </div>
    
        </div>
    </nav>

    <main class="w-full mt-16 overflow-x-scroll lg:overflow-hidden flex">
      <div class="lg:w-3/4 mx-auto flex gap-6 min-w-full">

        @includeIf('layouts.sidebar', ['active' => 'orders'])

        <div class="bg-white rounded-md min-w-profie flex-shrink-0">
            <div class="p-3 border-b-2 border-gray-200 border-solid w-full flex items-center">
              <a href="./profile.html" class="px-4 text-xl">
                <span class="fas fa-arrow-left"></span>
              </a>
              <h3 class="capitalize text-2xl">Orders</h3>
            </div>
            <div class=" p-3 w-full">
  
              <div class="border-2 border-solid border-gray-200 rounded-lg">
                <!-- -->
                <div class="p-3  grid grid-cols-9 gap-3">
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
                  <div class="col-span-1 text-right">
                    <a href="./order-details.html" class="font-bold text-slayText hover:bg-slay hover:text-gray-100 hover:opacity-75 p-2 rounded-lg">
                      See details
                    </a>
                  </div>
                </div>
              </div>
  
              <div class="border-2 border-solid border-gray-200 rounded-lg mt-2">
                <!-- -->
                <div class="p-3  grid grid-cols-9 gap-3">
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
                  <div class="col-span-1 text-right">
                    <a href="" class="font-bold text-slayText hover:bg-slay hover:text-gray-100 hover:opacity-75 p-2 rounded-lg">
                      See details
                    </a>
                  </div>
                </div>
              </div>
              <div class="border-2 border-solid border-gray-200 rounded-lg mt-2">
                <!-- -->
                <div class="p-3  grid grid-cols-9 gap-3">
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
                  <div class="col-span-1 text-right">
                    <a href="" class="font-bold text-slayText hover:bg-slay hover:text-gray-100 hover:opacity-75 p-2 rounded-lg">
                      See details
                    </a>
                  </div>
                </div>
              </div>
  
            </div>
          </div>
        </div>

      </div>
    </main>

</div>