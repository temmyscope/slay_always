@section('title', 'Login')

<div>
    <div class="verify-email">
        <div class="row text-center mt-3 mb-5">
            @if (session()->has('message'))
                <span>
                    {!! session('message') !!}
                </span>
            @else
                <span>
                    Please verify your email to gain full access. 
                    <button id="verifyButton"
                        type="submit" wire:click="resendVerificationLink" 
                        class="w-full my-6 rounded-md p-2 bg-bgSec font-medium text-white cursor-pointer hover:bg-gray-400 hover:text-black"
                    >
                        <span wire:loading.remove wire:target="resendVerificationLink">Resend Verification Link</span>
                        <span wire:loading.delay wire:target="resendVerificationLink"><i class="fa fa-spinner faa-spin animated"></i></span>
                    </button>
                </span>
            @endif
        </div>

    </div>
    <style>
    .verify-email {
        display: flex; flex-direction: row; justify-content: center; 
        align-items: center; width:100%; height: 50vh; 
        color: #fcfdff; background-color: #fff;
        text-align: center; 
    }
    </style>
</div>