@section('title', 'Home')
@section('description', 'Welcome to StaySlay - Fashion. Our Home')
@section('keywords', 'Stay, Slay, Fashion')

<div>
  <!-- video background -->
  <section class="w-full bg-gray-900 relative overflow-hidden flex justify-center items-center lg:h-vid h-smVid">
    <div class="z-10 text-white relative p-5 bg-bgPry rounded-md bg-opacity-50 text-2xl text-center">
      <a href="">
        <h1 class="font-bold lg:text-3xl">Welcome To Stay Slay Fashion</h1>
      </a>
    </div>
    <video autoplay loop muted class=" w-full absolute z-10 h-full">
      <source src="{{ asset('assets/assets/sss.mp4') }}" type="video/mp4">
      your browswer does not support this type of video
    </video>
  </section>
  <!-- card images in slide -->
  @if ( !$popular->empty() )

    <div class="w-full my-14">
      <div class="w-navWidth mx-auto">
        <h1 class="text-3xl text-center font-bold my-9">Customer Favourites</h1>
        
        <div class="grid grid-cols-3 lg:grid-cols-5 gap-4 w-full">

          @foreach ([ 0, 1,2, 3, 4 ] as $item)

            <!---- livewire product component ----->
            @livewire('product-card')

          @endforeach

        </div>
      </div>
    </div>

  @endif


  <!-- categories section -->
  @if( !empty($categories) )
  <main class="w-full my-8">
    <div class="w-navWidth mx-auto">
      <h1 class="text-center text-4xl font-bold">Categories</h1>

      <div class="grid grid-cols-2 lg:grid-cols-4 my-5 gap-4  w-full">
        @foreach ($categories as $name => $category)

          @livewire('category-card', ['category' => $category, 'name' => $name ], key($name))
            
        @endforeach

      </div>
    </div>
  </main>
  @endif

  <!-- section for gram shopping -->
  <div class="w-full mt-5">
    <div class="w-navWidth mx-auto text-center lg:text-4xl font-extrabold p-3 text-2xl">
      <h1>Our 'gram<i class="fab fa-instagram gram"></i> Shopping</h1>
    </div>
    <div class="grid grid-cols-4 my-5 gap-4  w-full ">

      @foreach ([1,2,3,4,5,6,7,8] as $item)
      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img src="{!! asset('/assets/assets/gram'.$item.'.PNG') !!}" alt="" style="width: 100%;object-fit:contain;">
          <div class="overlay">
            <div class="text">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
              <a href="{!! $instagram->external_url !!}" target="_blank">
                <button 
                  class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1"
                >
                  Shop
                </button>
              </a>
            </div>
          </div>
        </a>
      </div>
      @endforeach

    </div>
  </div>

  <!-- chat section -->
  <div>
    <script>
      function openWhatsapp(url) {
        window.location.href=url;
      }
    </script>
    <button 
      class="bg-slay text-gray-50 py-3 px-5 cursor-pointer fixed bottom-10 right-14 w-72 text-2xl rounded" 
      onclick="openWhatsapp('{!! $instagram->external_url !!}');"
    > Chat <span class="fas fa-comments text-2xl"></span>
    </button>
  </div>
  <!-- chat section -->

</div>