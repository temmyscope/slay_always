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

    <!-- End Content -->

    <!-- chat section -->
    <div>
      <script>
        function openWhatsapp() {
          window.location.href='';
        }
      </script>
      <button 
        class="bg-slay text-gray-50 py-3 px-5 cursor-pointer fixed bottom-10 right-14 w-72 text-2xl rounded" 
        onclick="openWhatsapp();"
      > Chat <span class="fas fa-comments text-2xl"></span>
      </button>
    </div>
    <!-- chat section -->

    @livewireScripts

    @livewire('footer')
  </body>
  <script src="{!! asset('assets/script/main.js') !!}"></script>
</html>