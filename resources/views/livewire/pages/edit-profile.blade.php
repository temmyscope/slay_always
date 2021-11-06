@section('title', 'Edit Profile')
@section('description', 'Welcome to StaySlay - Fashion. Edit Profile')
@section('keywords', 'Stay, Slay, Fashion')

<div>

  <nav class="w-full">
    <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
      <ul class="flex">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('home') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a>Edit Profile</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="w-full mt-16 overflow-x-auto lg:overflow-hidden flex">
    <div class="lg:w-3/4 mx-auto flex gap-6 w-full">
      
      @includeIf('layouts.sidebar', ['active' => 'edit-profile'])
        
      <div class="bg-white rounded-md min-w-profie flex-shrink-0">

        <div class="mb-10 text-gray-600 p-1 input-bod w-full">
          <h2 class="text-xl font-medium capitalize">details</h2>
        </div>
        <!-- <div class="w-4/5"> -->
        <p class="row text-center mt-3">
          @if (session()->has('message'))
              <div class="alert-success">
                  {!! session('message') !!}
              </div>
          @endif
        </p>
        <form class="p-3" wire:submit.prevent="updateUserProfile">
          <div class="grid grid-cols-2 gap-6  justify-between">
            <div class="py-2">
              <label for="name" class="w-8/12 block">Name</label>
              <input 
                type="text" name="name" id="name" placeholder="enter name"  wire:model="name"
                class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2"
              />
            </div>

            <div class="py-2">
              <label for="lname" class="w-8/12 block">Email</label>
              <span>
                <input 
                  disabled type="email" name="email" id="eml" placeholder="enter email" 
                  class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2" wire:model="email"
                >
              </span>
            </div>
            
            <div class="py-2">
              <label for="num" class="w-full block">Phone Number</label>
              <input 
                type="tel" name="num" id="num" placeholder="+234 8012345678" 
                class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none px-2" wire:model="mobile"
              >
              <a href="" wire:click.prevent="updateProfile" class="text-slayText font-bold">
                Save<span wire:loading wire:target="updateProfile"><i class="fa fa-spinner faa-spin animated"></i></span>
              </a>
            </div>

            <div class="py-2">
              <h3 class="font-bold">Newsletter preferences</h3>
              <div class="py-1">
                <input 
                  type="checkbox" wire:model="subscribed"  name="slay" id="slay" 
                  class="mr-1 inline-block relative top-0 w-4" {!! $subscribed === 'true' ? 'checked':'' !!}
                >
                <label for="slay" class="text-gray-900 capitalize">
                  How to Stay Slay (Fashion Tips)
                </label>
              </div>
            </div>

            <div class="col-span-2 text-center mt-4">
              <button 
                class="bg-bgSec text-white active:bg-purple-600 font-bold uppercase text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-lg w-1/2" 
                type="submit" 
              >Update<span wire:loading wire:target="updateUserProfile"><i class="fa fa-spinner faa-spin animated"></i></span>
              </button>
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </main>

</div>