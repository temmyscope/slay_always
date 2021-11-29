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
      type="video/mp4">
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
  
    <!--- modal announcement --->
    <div id="popup" class="home-modal">
        <div class="home-modal-content bg-white">
            <span id="closeMod" class="fas fa-times close-modal"></span>
            <div class="w-11/12 mx-auto">
                <h1 class="capitalize text-center text-xl my-4 font-bold" style="margin-top:5px;">
                    discounts, promotions & deals
                </h1>
                <ul class="text-center mx-3">
                    @if(isset($announcements[0]))
                        @foreach($announcements as $each)
                          <li>{!! $each->note !!}</li><br/>
                        @endforeach
                    @endif
                </ul>
            </div>
            
            <div class="w-11/12 mx-auto py-7">
                <button id="closeMod" class="bg-bgSec text-white active:bg-purple-600 font-bold uppercase text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-lg w-full" type="button">Contine Shopping</button>
            </div>
        </div>
    </div>
    <!--- modal announcement --->
  
    <script>
    let currentTime = Math.floor((new Date().getTime())/1000);
    if(localStorage.last_logged && 
        (currentTime-localStorage.last_logged) <= 86400
    ){
    }else{
        let homeModal = document.getElementById("popup");
        let showHomeModal = document.getElementById("displayModal")
        let spans = document.querySelectorAll("#closeMod");
        
        showHomeModal.onload = function() {
          homeModal.style.display = "block";
        }
        
        for (let mod = 0; mod < spans.length; mod++) {
          spans[mod].addEventListener('click', function(){
            homeModal.style.display = "none";
          });
        
        }
        
        window.onclick = function(event) {
          if (event.target == homeModal) {
            homeModal.style.display = "none";
          }
        }
        window.addEventListener('load', () => {
            Livewire.emit('newVisitorToday');
        });
    }
    localStorage.last_logged = currentTime;
    </script>

</div>