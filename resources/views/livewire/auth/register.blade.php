@section('title', 'Register')

<div>
    <!-- nav section -->
    <nav class="w-full mt-6">
        <ul class="w-navWidth flex mx-auto">
            <li class="underline p-3 font-bold text-xl">
            <a href="{!! route('welcome') !!}">Home</a>
            </li>
            <li class="p-3 text-gray-400 text-xl">
            Join
            </li>
        </ul>
    </nav>

    <!-- login form -->
    <section class="w-full">
        <div class="mt-6 lg:w-2/5 mx-auto flex justify-center">
        <div class="w-2/3 p-2">
        <form wire:submit.prevent="save">
            <h2 class="text-center mb-6 text-3xl font-medium">
                Create Account
            </h2>
            <p class="my-4 text-xl">
            
                <a class="underline" href="{!! route('login') !!}">Back to login</a>
            </p>

            <p class="row text-center mt-3">
                @if (session()->has('message'))
                    <div class="alert-success">
                        {!! session('message') !!}
                    </div>
                @endif
            </p>

            <input type="text" id="fname" wire:model="firstname" placeholder="first name" required class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200">
            @error('firstname') <span class="alert-danger">{{ $message }}</span> @enderror

            <input type="text" id="lname" wire:model="lastname" id="" placeholder="last name" required class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200">
            @error('lastname') <span class="alert-danger">{{ $message }}</span> @enderror

            <input type="email" id="email" wire:model="email" id="" placeholder="email" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200">
            @error('email') <span class="alert-danger">{{ $message }}</span> @enderror

            <input type="password" id="pass" wire:model="password" id="" placeholder="password" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200 mb-3">
            @error('password') <span class="alert-danger">{{ $message }}</span> @enderror

            <input type="password" id="confirmpass" wire:model="password_confirm" id="" placeholder="confirm password" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200 mb-3">
            @error('password_confirm') <span class="alert-danger">{{ $message }}</span> @enderror
            
            <span class="flex w-full">
                <input type="checkbox" name="agree" id="agree" class="mr-1 inline-block relative top-2 w-4" checked disabled>
                <label for="agree" class="p-1 text-gray-500">
                I agree to Stay slay fashion's Terms of Service and Privacy Policy
                </label>
            </span>
            <button type="submit"
                class="w-3/5 my-6 rounded-md block p-2 bg-bgSec font-medium text-white cursor-pointer hover:bg-gray-400 hover:text-black"
            ><span wire:loading.remove wire:target="save">Create Account</span>
            <span wire:loading wire:target="save">Registering <i class="fa fa-spinner faa-spin animated"></i></span>
            </button>
            
        </form>
        </div>
        </div>
    </section>
</div>