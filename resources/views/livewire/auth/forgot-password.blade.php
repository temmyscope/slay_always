@section('title', 'Forgot Password')

@section('content')
<nav class="w-full mt-6">
    <ul class="w-navWidth flex mx-auto">
      <li class="underline p-3 font-bold text-xl">
        <a href="{!! route('welcome') !!}">Home</a>
      </li>
      <li class="p-3 text-gray-400 text-xl">
        Reset password
      </li>
    </ul>
</nav>

<!-- login form -->
<section class="w-full">
  <div class="mt-10 lg:w-2/5 mx-auto flex justify-center">
    <form class="w-2/3 p-2">
      <h2 class="text-center mb-6 text-3xl font-medium">
        Reset Your Password
      </h2>

      <p class="row text-center mt-3">
        @if (session()->has('message'))
            <div class="alert-success">
                {!! session('email') !!}
            </div>
        @endif
      </p>

      <p class="my-4 text-xl text-gray-400">
        We will send you an email to reset your password.
      </p>
      <input type="email" id="" placeholder="email" class="w-full my-2 p-2 focus:ring-0 focus:outline-none rounded-md border-gray-200">
      <span class="w-full flex my-6 items-center gap-x-2">
        <input type="submit" value="Submit" class="w-2/5 p-2 bg-bgSec rounded-lg font-medium text-white cursor-pointer hover:bg-gray-400 hover:text-black">
        <a href="#" class="underline font-medium text-xl">Cancel</a>
      </span>
    </form>
  </div>
</section>
@endsection