@section('title', 'Reset Password')

<div>

    <!-- login form -->
    <section class="w-full">
        <div class="mt-6 lg:w-2/5 mx-auto flex justify-center">
        <div class="w-2/3 p-2">
        <form wire:submit.prevent="save">
            <h2 class="text-center mb-6 text-3xl font-medium">
                Account Reset
            </h2>

            <p class="row text-center mt-3">
                @if (session()->has('message'))
                    <div class="alert-danger">
                      {!! session('email') !!}
                    </div>
                @endif
            </p>

            <input type="email" id="email" wire:model="email" id="" placeholder="email" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200">
            @error('email') <span class="alert-danger">{{ $message }}</span> @enderror

            <input type="hidden" wire:model="token" id="token">

            <input type="password" id="pass" wire:model="password" id="" placeholder="password" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200 mb-3">
            @error('password') <span class="alert-danger">{{ $message }}</span> @enderror

            <input type="password" id="confirmpass" wire:model="password_confirmation" id="" placeholder="confirm password" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200 mb-3">
            @error('password_confirmation') <span class="alert-danger">{{ $message }}</span> @enderror
            
            <button type="submit"
                class="w-3/5 my-6 rounded-md block p-2 bg-bgSec font-medium text-white cursor-pointer hover:bg-gray-400 hover:text-black"
            ><span wire:loading.remove>Update My Password</span>
            <span wire:loading wire:target="save">Updating <i class="fa fa-spinner faa-spin animated"></i></span>
            </button>
            
        </form>
        </div>
        </div>
    </section>
</div>