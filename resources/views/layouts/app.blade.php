<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title> @yield('title') | StaySlay - Fashion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name='description' content="Unisex Ready To Wear brand & custom made; @yield('description')" />
    <meta name='keywords' content="Stay, Slay, Fashion, Clothing, @yield('keywords')" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <link rel="manifest" href="{!! asset('/manifest.json') !!}" />
    <link href="{!! asset('assets/css/app.css') !!}" rel='stylesheet'>
    <meta name='author' content='Elisha Temiloluwa a.k.a TemmyScope'/>
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <meta name='robots' content='index, follow' />

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Nunito:300,400,500,700&display=swap' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons' />

    <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-messaging.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{!! asset('assets/css/styles.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}" />
    <link href="{!! asset('assets/css/fa-animation.min.css') !!}" rel="stylesheet" type="text/css" />
    <style>
      .alert-danger {
        color: white; background-color: #e3404a;
      }
      .alert-success {
        color: #fcfdff; background-color: #eb822a;
      }
    </style>

    @livewireStyles
  </head>

  <body class="font-slayFont">
    <!-- Navbar -->
    @livewire('search')

    <!-- subsequently smaller layer views can be included here -->

    <!-- Start content -->
    
    @yield('content')

    @livewireScripts

    @if ( str_contains( url()->current(), 'invoice' )  )
            
    @else
    <!-- footer section -->
    <footer class="bg-bgSec w-full text-white py-10">
      <div class="w-navWidth mx-auto flex justify-around flex-wrap">
        <div class="capitalize lg:order-1 order-2 w-full lg:w-auto borderr">
          <h5 class="footer-accordion uppercase font-medium text-lg">Get Help</h5>
          <ul class="footer-panel py-1">
            <li class="py-2">
              <a href="#">
                Help center
              </a>
            </li>
            <li class="py-2">
              <a href="#">
                track order
              </a>
            </li>
            <li class="py-2">
              <a href="#">
                shipping info
              </a>
            </li>
            <li class="py-2">
              <a href="#">
                returns
              </a>
            </li>
            <li class="py-2">
              <a href="#">
                contact us
              </a>
            </li>
          </ul>
        </div>

        <div class="lg:order-2 order-3 w-full lg:w-auto borderr">
          <h5 class="footer-accordion uppercase font-medium text-lg">Company</h5>
          <ul class="footer-panel py-1">
            <li class="py-2">
              <a href="">
                careers
              </a>
            </li>
            <li class="py-2">
              <a href="">
                about
              </a>
            </li>
            <li class="py-2">
              <a href="">
                stores
              </a>
            </li>
          </ul>
        </div>

        <div class="lg:order-3 order-4 w-full lg:w-auto borderr">
          <h5 class="footer-accordion uppercase font-medium text-lg">Quick Links</h5>
          <ul class="footer-panel py-1">
            <li class="py-2">
              <a href="">
                size guide
              </a>
            </li>
            <li class="py-2">
              <a href="">
                gift cards
              </a>
            </li>
          </ul>
        </div>
        
        <div class="lg:w-2/6 lg:order-4 order-1 w-full lg:block flex flex-wrap">
          <label for="" class="order-2 lg:order-1 w-full my-3 font-bold">Sign up for discounts + updates</label>
          <div class="w-full flex border rounded-md border-gray-500  items-center bg-black text-black mt-3 mb-3 order-2">    
            <input type="email" placeholder="enter email address" class="py-3 w-full p-1 border-0 focus:ring-0 focus:outline-none rounded-md text-black">  
            <button type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 my-1 ml-1 pl-1 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
          <small class="text-gray-400 order-3">By signing up for email, you agree to Stay Slay Fashion's <a href="#" class="underline">Terms of Service </a>and <a href="#" class="underline">Privacy policy</a></small>
          <!-- icons -->
          <div class="flex my-7 order-1 lg:order-4 w-full lg:w-3/4 justify-around">
            <span class="px-2">
              <a href="#">
                <i class="fab fa-instagram footer-gram"></i>
              </a>
            </span>
            <span class="px-2">
              <a href="">
                <i class="fab fa-pinterest footer-gram"></i>
              </a>
            </span>
            <span class="px-2">
              <a href="https://web.whatsapp.com/send?phone=2349075620497&text=Hello!%20I%want%20to%20o%20make%20an%20order">
                <i class="fab fa-whatsapp footer-gram"></i>
              </a>
            </span>
            <span class="px-2">
              <a href="">
                <i class="fab fa-facebook footer-gram"></i>
              </a>
            </span>
            <span class="px-2">
              <a href="">
                <i class="fab fa-snapchat-ghost footer-gram"></i>
              </a>
            </span>
          </div>
        </div>

      </div>

      <div class="text-white py-6 mt-6">
        <div class="w-navWidth mx-auto foot-border py-5">
          <span>
            &copy; 2021 Stay Slay Fashion, All Rights Reserved
          </span>
        </div>
      </div>
    </footer>
    <!-- end of footer section -->
            
    @endif
    
  </body>
  <script src="{!! asset('assets/script/main.js') !!}"></script>
</html>