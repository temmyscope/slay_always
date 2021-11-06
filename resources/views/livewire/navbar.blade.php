<div>
  <header class="w-full bg-bgSec py-3 sticky top-0 z-30 border-b-2 border-gray-300">
    <div class="flex flex-wrap lg:w-navWidth mx-auto justify-between items-center h-full w-smWidth">
      <!-- logo -->
      <div class="w-1/2 lg:w-2/5 flex lg:order-1 order-1">
        <a href="{!! route('welcome') !!}"><img src="{{asset('assets/assets/loggo.PNG')}}" alt="company's logo"></a>
      </div>

      <!-- search input -->
      <div class="w-full lg:w-inptW flex border rounded-3xl border-gray-500  items-center bg-white lg:order-2 order-3">    
        <a wire:click="searchForQuery">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 my-1 ml-1 pl-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </a>
        <input type="search" wire:model="searchQuery" wire:keydown.enter="searchForQuery" placeholder="Search" class="py-3 w-full p-1 border-0 focus:ring-0 focus:outline-none rounded-3xl">
      </div>

      <!-- icons -->
      <div class="flex items-center lg:order-3 order-2 w-1/2 lg:w-iconW justify-end pb-1">
        <a href="{!! route('user-recent') !!}" class="p-1 lg:p-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" style="fill: #eb822a; " stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </a>

        <a href="{!! route('user-favorites') !!}" class="p-1 lg:p-5 relative">
          @if ( $favorites && $favorites > 0)
          <span id="counters" class="inline-flex absolute -right-3 lg:-right-0 items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-slay rounded-full">
            {!! $favorites !!}
          </span>    
          @endif
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
        </a>

        <a href="{!! auth()->user()? route('user-profile') : route('login') !!}" class="p-1 lg:p-5 lg:inline hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </a>
      
        <a href="{!! route('user-cart') !!}" class="p-1 px-1 lg:p-5 relative">
          @if ( $cartItemsCount && $cartItemsCount > 0)
          <span id="counters" class="inline-flex absolute -right-3 lg:-right-0 items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-slay rounded-full">
            {!! $cartItemsCount !!}
          </span>    
          @endif
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
        </a>

      </div>
    </div>
    <!-- end of Navbar -->
    
    <!-- slide text -->
    <div class="w-full h-14 bg-bgSec mt-2 border-t-2 border-gray-400">
      <div class="lg:w-navWidth w-full mx-auto">
  
        <div class="w-full text-white h-full overflow-hidden items-center py-3 text-center flex">
          @if (empty($notes))
          <div id="slides" class="w-full h-full hidden ">
            <p>Welcome To StaySlay-Fashion</p>
          </div>
          @else
          @foreach ($notes as $note)
          <div id="slides" class="w-full h-full hidden ">
            <p>{!! $note->note !!}</p>
          </div>
          @endforeach
          @endif
        </div>

      </div>
    </div>
    
    <!--- End of slide --->
  </header>
</div>