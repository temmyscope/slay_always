@section('title', 'Login')

<div>
  <!-- nav section -->
  <nav class="w-full mt-6">
      <ul class="w-navWidth flex mx-auto">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('welcome') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">Login</li>
      </ul>
  </nav>

  <!-- login form -->
  <section class="w-full">
    <div class="mt-10 lg:w-2/5 mx-auto flex justify-center">
      <form class="w-2/3 p-2" wire:submit.prevent="logMeIn">
        <h2 class="text-center mb-6 text-3xl font-bold">
          User/Customer Login
        </h2>

        <p class="row text-center mt-3">
          @if (session()->has('error'))
            <div class="alert-danger">
              {!! session('error') !!}
            </div>
          @endif
        </p>

        <p class="row text-center mt-3">
          @if (session()->has('message'))
            <div class="alert-success">
                {!! session('message') !!}
            </div>
          @endif
        </p>

        <p class="my-4 text-xl">
          Not a memeber? 
          <a class="underline" href="{!! route('register') !!}">Join Us</a>
        </p>

        <input type="email" id="email" placeholder="email" wire:model="email" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200">
        @error('email') <span class="alert-danger">{{ $message }}</span> @enderror

        <input type="password" id="pass" placeholder="password" wire:model="password" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200 mb-3">
        @error('password') <span class="alert-danger">{{ $message }}</span> @enderror

        <a class="w-full underline" href="{!! route('forgot-password') !!}">Forgot your password?</a>

        <button type="submit" class="w-full my-6 rounded-md p-2 bg-bgSec font-medium text-white cursor-pointer hover:bg-slay  hover:text-gray-100">
          <span wire:loading.remove>LogIn</span>
          <span wire:loading wire:target="logMeIn">Authenticating <i class="fa fa-spinner faa-spin animated"></i></span>
        </button>
      </form>
    </div>
  </section>
</div>
