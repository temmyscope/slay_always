<div>
  @if($instagramPosts && isset($instagramPosts[0]) )
  <!-- section for gram shopping -->
  <div class="w-full mt-5">
      <div class="w-navWidth mx-auto text-center lg:text-4xl font-extrabold p-3 text-2xl">
      <h1>Our 'gram<i class="fab fa-instagram gram"></i> Shopping</h1>
      </div>
      <div class="grid grid-cols-4 my-5 gap-4  w-full ">
         
          @foreach ($instagramPosts as $item)
          <div class=" shadow-md max-w-full rounded-sm text-center relative cont">
              <img src="{!! cdnizeURL($item->image->src) !!}" alt="" style="width: 100%;object-fit:contain;">
              <div class="overlay">
                  <div class="text">
                      <span>
                          <i class="fab fa-instagram"></i>
                      </span>
                      <a href="{!! $item->link !!}" target="_blank">
                          <button 
                          class="w-28 lg:w-3/4 bg-gray-700 text-white opacity-100 font-extrabold lg:text-xl mt-7 rounded-lg lg:p-3 p-1"
                          >
                          Shop
                          </button>
                      </a>
                  </div>
              </div>
          </div>
          @endforeach

      </div>
  </div>
  @endif
<!-- chat section -->
<div>
  <a href="https://web.whatsapp.com/send?phone=2349075620497&text=Hello!%20I%want%20to%20o%20make%20an%20order" target="_blank" >
    <button class="text-gray-50 py-3 px-4 cursor-pointer fixed lg:bottom-10 bottom-5 lg:right-9 right-5 rounded-full" style="background-color:#25D366;">
      <span style="color: #fff;" class="fab fa-whatsapp text-5xl text-slayText"></span>
    </button>
  </a>
</div>
<!-- chat section -->
</div>
