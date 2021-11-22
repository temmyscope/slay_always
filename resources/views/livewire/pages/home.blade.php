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
      <source src="{{ 
        empty($youtube)? asset('assets/assets/sss.mp4') : $youtube }}" 
        type="video/mp4"
      >
      your browswer does not support this type of video
    </video>
  </section>
  <!-- card images in slide -->
  @if ( $popular && isset($popular[0]) )

    <div class="w-full my-14">
      <div class="w-navWidth mx-auto">
        <h1 class="text-3xl text-center font-bold my-9">Customer Favourites</h1>
        
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 w-full">

          @foreach ($popular as $i => $pop)

            <!---- livewire product component ----->
            @livewire('product-card', ['product' => $pop ], key('pop-'.$i.'-'.$pop->id))

          @endforeach

        </div>
      </div>
    </div>
  @else
    @if ( $random && isset($random[0]) )
      <div class="w-full my-14">
        <div class="w-navWidth mx-auto">
          <h1 class="text-3xl text-center font-bold my-9">Hot Picks For You</h1>
          
          <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 w-full">
            @foreach ($random as $index => $item)

              <!---- livewire product component ----->
              @livewire('product-card', ['product' => $item ], key('random'.$index.'-'.$item->id))

            @endforeach

          </div>
        </div>
      </div>

    @endif
  @endif

  
  <!-- categories section -->
  @livewire('category-card')
  
  @livewire('instagram')

</div>