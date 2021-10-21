@section('title', 'Login')

<style>
.verify-email {
    display: flex; flex-direction: row; justify-content: center; 
    align-items: center; width:100%; height: 60%; 
    color: #fcfdff; background-color: #eb822a;
    text-align: center;
}
</style>
<div class="verify-email">

    <p class="row text-center mt-3">
        @if (session()->has('message'))
            <span>
                {!! session('message') !!}
            </span>
        @else
            <span>
                Please verify your email to gain full access. 
                <button type="submit" wire:click="resendVerificationLink" class="w-full my-6 rounded-md p-2 bg-bgSec font-medium text-white cursor-pointer hover:bg-gray-400 hover:text-black">
                    <span wire:loading.remove>Resend Verification Link</span>
                    <span wire:loading wire:target="resendVerificationLink">Sending<i class="fa fa-spinner faa-spin animated"></i></span>
                </button>
            </span>
        @endif
    </p>
</div>