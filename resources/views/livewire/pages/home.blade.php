@section('title', 'Home')
@section('description', 'Welcome to StaySlay - Fashion. Our Home')
@section('keywords', 'Stay, Slay, Fashion')

<div>
  @push('script')
  <script>
  function openGram(link) {
    return window.location.href=link;
  }
  </script>
  @endpush
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

      @foreach ($instagram->edge_owner_to_timeline_media->edges as $item)
      <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
        <a href="">
          <img 
            class="h-full" alt="" style="width:100%;height:500px;object-fit:cover;" crossorigin="anonymous" decoding="auto"
            srcset="https://scontent-los2-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/250541284_623178985363182_105255129482915897_n.jpg?_nc_ht=scontent-los2-1.cdninstagram.com&_nc_cat=106&_nc_ohc=MDddN5cc3BYAX8ErUmT&edm=AABBvjUBAAAA&ccb=7-4&oh=f478e89bb3d7e539e03209757e17f07c&oe=6188E230&_nc_sid=83d603 640w,https://scontent-los2-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s750x750/250541284_623178985363182_105255129482915897_n.jpg?_nc_ht=scontent-los2-1.cdninstagram.com&_nc_cat=106&_nc_ohc=MDddN5cc3BYAX8ErUmT&edm=AABBvjUBAAAA&ccb=7-4&oh=80b2da90213526d78c53807ed91197bb&oe=618A58B0&_nc_sid=83d603 750w,https://scontent-los2-1.cdninstagram.com/v/t51.2885-15/e35/s1080x1080/250541284_623178985363182_105255129482915897_n.jpg?_nc_ht=scontent-los2-1.cdninstagram.com&_nc_cat=106&_nc_ohc=MDddN5cc3BYAX8ErUmT&edm=AABBvjUBAAAA&ccb=7-4&oh=9738798a15128620b3f277a1290c9279&oe=6189BE59&_nc_sid=83d603 1080w"  
            src="https://scontent-los2-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/250541284_623178985363182_105255129482915897_n.jpg?_nc_ht=scontent-los2-1.cdninstagram.com&_nc_cat=106&_nc_ohc=MDddN5cc3BYAX8ErUmT&edm=AABBvjUBAAAA&ccb=7-4&oh=f478e89bb3d7e539e03209757e17f07c&oe=6188E230&_nc_sid=83d603"
          />
          <div class="overlay">
            <div class="text">
              <span>
                <a href="https://instagram.com/p/{{$item->node->shortcode}}" target="_blank" rel="no-follow">
                  <i class="fab fa-instagram"></i>
                </a>
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

</div>