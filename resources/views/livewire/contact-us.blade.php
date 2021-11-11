<div>
    <!-- contact us -->
    <section id="theContact" class="w-full mt-16 py-9 bg-gray-100">
        <div class="lg:w-2/5 w-navWidth mx-auto">
          <div class="py-5">
            <h1 class="font-bold text-4xl text-center">Contact us</h1>
          </div>
          <div class="w-full">
            @if ( !empty(session('message')) )
            <div class="mt-5 w-full text-center text-slayText bg-black p-1 rounded-md font-extrabold">
              <p>{!! session('message') !!}</p>
            </div>
            @else
            <p class="text-center font-semibold">Kindly fill out the form below to get in touch with us, we are always happy to help!</p>
            @endif

            <form class="grid justify-center w-full" wire:submit.prevent="saveFeedback">
              <div class="py-3 inline-block w-full">
                <h3 class="py-3 font-medium">What type of feedback?</h3>
                <!-- <p class="mb-5">Did it fit exactly?</p> -->
                <input type="radio" name="feed" id="feed-back1" class="hidden" value="complaint" wire:model="type" />
                <input type="radio" name="feed" id="feed-back2" class="hidden" value="enquiry" wire:model="type" />
                <input type="radio" name="feed" id="feed-back3" class="hidden" value="suggestions" wire:model="type" />
      
                <label for="feed-back1" class="w-24 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-lg font-bold py-2 lg:mr-3 mr-1 feed1 m-1">Complaint</label>
                <label for="feed-back2" class="w-20 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-lg font-bold py-2 lg:mr-3 mr-1 feed2 m-1">Enquiry</label>
                <label for="feed-back3" class="w-25 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-lg font-bold py-2 lg:mr-3 mr-1 feed3 m-1">Suggestions</label>
              </div>
              @error('type') <span class="alert-danger">{{ $message }}</span> @enderror

              <div class="py-3 inline-block w-full">
                <h3 class="py-3 font-medium">What's your feedback about?</h3>
                <!-- <p class="mb-5">Did it fit exactly?</p> -->
                <input type="radio" name="contact" id="feed-abt1" class="hidden" wire:model="subject" value="order" />
                <input type="radio" name="contact" id="feed-abt2" class="hidden" wire:model="subject" value="products" />
                <input type="radio" name="contact" id="feed-abt3" class="hidden" wire:model="subject" value="website" />
                <input type="radio" name="contact" id="feed-abt4" class="hidden" wire:model="subject" value="others" />
      
                <label for="feed-abt1" class="w-20 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-lg font-bold py-2 lg:mr-3 mr-1 contact1 m-1">Order</label>
                <label for="feed-abt2" class="w-30 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-lg font-bold py-2 lg:mr-3 mr-1 contact2 m-1">our products</label>
                <label for="feed-abt3" class="w-20 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-lg font-bold py-2 lg:mr-3 mr-1 contact3 m-1">website</label>
                <label for="feed-abt4" class="w-20 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-lg font-bold py-2 lg:mr-3 mr-1 contact4 m-1">others</label>
              </div>
              @error('subject') <span class="alert-danger">{{ $message }}</span> @enderror
    
              <div class="mt-5 w-full">
                @guest
                <input 
                    type="text" name="name" id="name" placeholder="please enter your name" wire:model="nameOfSender"
                    class="w-full py-1 border-2 border-solid border-gray-300 focus:ring-0 focus:outline-none  px-2 rounded-md"
                />
                @error('nameOfSender') <span class="alert-danger">{{ $message }}</span> @enderror

                <input 
                    type="email" name="mail" id="" placeholder="please enter your email" wire:model="emailOfSender"
                    class="w-full py-1 border-2 border-solid border-gray-300 focus:ring-0 focus:outline-none  px-2 rounded-md mt-5"
                /> 
                @error('emailOfSender') <span class="alert-danger">{{ $message }}</span> @enderror
                @endguest
    
                <div class="w-full mt-5">
                  <label for="feedback" class="w-full">Your Feedback</label>
                    <textarea 
                        name="feedback" id="feedback" cols="30" rows="4" wire:model="feedback"
                        class="w-full py-1 border-2 border-solid border-gray-300 focus:ring-0 focus:outline-none  px-2 rounded-md mt-2 resize-none"
                    ></textarea>
                </div>
                @error('feedback') <span class="alert-danger">{{ $message }}</span> @enderror
    
              </div>

              <div class="mt-5 w-full">
                <button class="bg-bgSec text-white active:bg-purple-600 font-bold uppercase text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-lg w-full" type="submit">
                  Submit
                  <span wire:loading wire:target="saveFeedback">
                    Please wait... <i class="fa fa-spinner faa-spin animated"></i>
                  </span>
                </button>
              </div>
              
            </form>

          </div>
        </div>
    </section>
</div>
