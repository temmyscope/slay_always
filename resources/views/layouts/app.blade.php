<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Google Tag Manager -->
    <script defer>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N5PWSSD');
    </script>
  <!-- End Google Tag Manager -->
    <title> @yield('title') | StaySlay - Fashion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name='description' content="Unisex Ready To Wear brand & custom made; @yield('description')" />
    <meta name='keywords' content="Stay, Slay, Fashion, Clothing, @yield('keywords')" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <link rel="manifest" href="{!! asset('/manifest.json') !!}" />
    <link href="{!! asset('assets/css/app.css') !!}" rel='stylesheet'>
    <meta name='author' content='Elisha Temiloluwa a.k.a TemmyScope'/>
    <link rel="icon" href="{!! asset('assets/images/favicon.png') !!}" type="image/x-icon" />
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
    {!! App\Models\PageScript::head() !!}
    @livewireStyles
  </head>

  <body class="font-slayFont bg-gray-100">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5PWSSD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Navbar -->
    @livewire('search')

    <!-- subsequently smaller layer views can be included here -->

    <!-- Start content -->
    
    @yield('content')

    <!-- End Content -->

    @includeIf('livewire.footer')

    @livewireScripts

  </body>
  {!! App\Models\PageScript::foot() !!}
  <script src="{!! asset('assets/script/product.js') !!}"></script>
</html>