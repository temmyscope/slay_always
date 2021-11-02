@section('title', 'Profile')
@section('description', 'Welcome to StaySlay - Fashion. Your Profile')
@section('keywords', 'Stay, Slay, Fashion')

<div>

  <nav class="w-full">
    <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
      <ul class="flex">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('home') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a>Profile</a>
        </li>
      </ul>

      <div class="flex items-center p-1">
        <p class="px-2 text-2xl">Hello</p>
        <div class="py-4 px-4 rounded-full bg-bgSec text-gray-200 text-center">
          <p class="uppercase text-2xl">sd</p>
        </div>
      </div>

    </div>
  </nav>

  <main class="w-full mt-16 overflow-x-auto lg:overflow-hidden flex">
    <div class="lg:w-3/4 mx-auto flex gap-6 w-full">
      
      @includeIf('layouts.sidebar', ['active' => 'profile'])

      <div class="bg-white rounded-md min-w-profie flex-shrink-0">
        <div class="p-3 border-b-2 border-gray-200 border-solid w-full">
          <h3 class="capitalize text-2xl">account overview</h3>
        </div>
        <div class="grid grid-cols-2 gap-6 p-3 w-full">
          <div class="border-2 border-solid border-gray-200 rounded-lg">
            <div class="flex justify-between items-center border-b-2 border-gray-200 border-solid p-1">
              <h3 class="capitalize text-xl">account details</h3>
              <button class="fas fa-pen cursor-pointer text-slayText hover:bg-slay hover:text-gray-200 p-3 rounded-full hover:opacity-60"></button>
            </div>
            <div class="p-3">
              <p class="font-semibold capitalize">elisha temmyscope</p>
              <p class="text-gray-500">scope@yahoo.com</p>

              <button class="mt-12 text-slayText font-bold hover:bg-slay hover:text-gray-200 p-1 rounded-md">
                Change Password
              </button>
            </div>
          </div>

          <div class="border-2 border-solid border-gray-200 rounded-lg w-full">
            <div class="flex justify-between items-center p-1 border-b-2 border-gray-200 border-solid">
              <h3 class="capitalize text-xl">address details</h3>
              <button class="fas fa-pen cursor-pointer text-slayText hover:bg-slay hover:text-gray-200 p-3 rounded-full hover:opacity-60"></button>
            </div>
            <div class="p-3">
              <p class="font-semibold">Your default shipping address:</p>
              <p class="text-gray-500">samuel damilola</p>
              <address class="text-gray-500">
                15b, Scope street, Samfrexz Bus stop, Ketu <br>
                Ketu, Lagos.
                <p>+234 8000400020</p>
              </address>
            </div>
          </div>

          <div class="border-2 border-solid border-gray-200 rounded-lg w-full">
            <div class="flex justify-between items-center p-1 border-b-2 border-gray-200 border-solid">
              <h3 class="capitalize text-xl">Newsletter preferences</h3>
              <button class="fas fa-pen cursor-pointer text-slayText hover:bg-slay hover:text-gray-200 p-3 rounded-full hover:opacity-60"></button>
            </div>
            <div class="p-3">
              <p class="font-semibold">You're currently subscribed to the following newsletters:</p>
              <ul class="py-2 text-gray-500">
                <li><span class="text-green-400">&#10003;</span> fashion tips newsletters</li>
                <li><span class="text-green-400">&#10003;</span> daily newsletters</li>
              </ul>
              
            </div>
          </div>

          <div class="border-2 border-solid border-gray-200 rounded-lg">
            <div class="p-2 border-b-2 border-gray-200 border-solid">
              <h3 class="capitalize text-xl">stay slay voucher</h3>
            </div>
            <div class="p-3">
              <p class="font-semibold">Voucher code:</p>
              <p class="text-gray-500">currently you've no voucher</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <section class="w-full mt-10">
    <div class="w-navWidth mx-auto">
      <div class="py-10">
        <h3 class="capitalize text-4xl text-gray-800 font-bold lg:text-center">Recommended for you</h3>
      </div>
      <div class="grid lg:grid-cols-5 grid-cols-2 mt-4 gap-4">

      </div>
    </div>
  </section>

</div>