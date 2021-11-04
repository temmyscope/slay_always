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
            <div class="mt-2 text-gray-600 p-1 input-bod w-full">
            <h2 class="text-xl font-medium capitalize">change password</h2>
            </div>
            
            <form class="p-3 mt-10 ">
                <div class="lg:w-1/2 mx-auto">
                <div class="py-2">
                    <label for="name" class="w-8/12 block">Password</label>
                    <input type="password" name="name" id="name" placeholder="enter password" class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none px-2">
                </div>

                <div class="py-2">
                    <label for="lname" class="w-8/12 block">Confirm Password</label>
                    <input type="password" name="lname" id="lname" placeholder="confirm password" class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none px-2">
                </div>

                <div class="mt-4">
                    <button 
                        class="bg-bgSec text-white active:bg-purple-600 font-bold uppercase text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-lg w-9/12" 
                        wire:click="changePass"
                    >
                    Submit
                    </button>
                </div>

                </div>
            </form>
            
        </div>
    </div>
  </main>

</div>
