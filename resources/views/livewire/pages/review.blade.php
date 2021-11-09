@section('title', 'Review')

<div>
  <link href="{!! asset('assets/css/5-star-rating.css') !!}" rel="stylesheet" />
  <nav class="w-full">
    <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
      <ul class="flex">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('home') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a>Review</a>
        </li>
      </ul>
    </div>
  </nav>

  
  <main class="w-full mt-16 mb-4 overflow-x-scroll lg:overflow-hidden flex">
    <div class="lg:w-3/4 mx-auto flex gap-6 min-w-full">
      
      @includeIf('layouts.sidebar', ['active' => 'review'])

      <!--  -->
      <div class="bg-white rounded-md lg:w-4/5 w-full flex-shrink-0">
        <div class="p-2 border-b-2 border-gray-200 border-solid w-full">
          <h3 class="capitalize text-2xl">reviews</h3>
        </div>
        <div class=" p-1 w-full">

        <!-- review page -->
    
          <form wire:submit.prevent="submitReview">
            <div class="px-2 lg:flex bg-gray-200 py-1 rounded-lg">
              <div class="lg:w-1/2">
                <div class="py-3">
                  <label for="country" class="w-full block mb-4">What size did you purchase?</label>
                  <select 
                    name="sizePurchase" id="country" wire:model="sizePurchased"
                    class="w-full text-gray-800 input-rate py-3 rounded-lg focus:ring-0 focus:outline-none  px-2"
                  >
                    <option>Please select one</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="Sm">sm</option>
                    <option value="M">M</option>
                    <option value="L"> L</option>
                  </select>
                </div>

                <div class="py-3 inline-block w-full">
                  <p class="mb-5">Did it fit exactly?</p>
                  @foreach ($availableFittings as $index => $item)
                  <input wire:model="fitting" type="radio" name="rating" id="rating{!!$index+1!!}" class="hidden" value="{!! $item !!}">
                  @endforeach

                  <label for="rating1" class="w-28 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-3xl font-bold py-3 lg:mr-3 mr-1 rate1 m-1">True to size</label>
                  <label for="rating2" class="w-28 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-3xl font-bold py-3 lg:mr-3 mr-1 rate2 m-1">Runs small</label>
                  <label for="rating3" class="w-28 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-3xl font-bold py-3 lg:mr-3 mr-1 rate3 m-1">Too large</label>
                </div>

                <div>
                  <label for="" class="block mt-2 py-1">Write your review</label>
                  <textarea 
                    name="residential" id="residential" cols="30" rows="5" placeholder="" wire:model="comment"
                    class="w-full py-2 input-rate rounded-lg focus:ring-0 focus:outline-none  px-2"
                  ></textarea>
                </div>
              <button 
                type="submit"
                class="bg-black text-white font-bold text-base w-full rounded-lg mt-3 outline-none focus:outline-none py-3 hover:bg-slay"
              >
                Submit Review 
                <span wire:loading wire:target="submitReview"> <i class="fa fa-spinner faa-spin animated"></i></span>
              </button>
            </div>
                
                <div class="lg:w-1/2 lg:mt-0 mt-5">
                  <div class="w-1/2 mx-auto">
        
                    <div class="lg:w-3/5 justify-center">

                      <div class="text-center">
                        <h2 class="font-bold text-3xl py-1">{!!$stars!!}/5</h2>
                        <span class="pr-3 cursor-pointer rating">
                          <input wire:model="stars" type="radio" name="star" id="star-1" value="1">
                          <input wire:model="stars"  type="radio" name="star" id="star-2" value="2">
                          <input wire:model="stars"  type="radio" name="star" id="star-3" value="3">
                          <input wire:model="stars"  type="radio" name="star" id="star-4" value="4">
                          <input wire:model="stars"  type="radio" name="star" id="star-5" value="5">
                          <label for="star-1" class="fas fa-star star-rate1 star-rating cursor-pointer"></label>
                          <label for="star-2" class="fas fa-star star-rate1 star-rating cursor-pointer"></label>
                          <label for="star-3" class="fas fa-star star-rate1 star-rating cursor-pointer"></label>
                          <label for="star-4" class="fas fa-star star-rate1 star-rating cursor-pointer"></label>
                          <label for="star-5" class="fas fa-star star-rate1 star-rating cursor-pointer"></label>
                        </span>

                        
                        <p class="py-2">{!! $product->reviews->count() !!} review</p>
                      </div>
                      
                    </div>
                  
                    <div class="lg:w-8/12 rounded-lg h-auto">
                      <table class="w-full">
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  
                  <!-- product purchased -->
                  <div class="w-1/2 lg:mt-8 mt-3 py-1">
                    <img src="https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                  </div>

                </div>
              </div>
            </div>
          </form>
     
          <!-- </section> -->

        </div>
        
      </div>
    </div>
  </main>

</div>
