<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title> @yield('title') | StaySlay - Fashion</title>
    <link rel='icon' href='/favicon.ico' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name='description' content="Unisex Ready To Wear brand & custom made; @yield('description')" />
    <meta name='keywords' content="Stay, Slay, Fashion, Clothing, @yield('keywords')" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link href='/css/app.css' rel='stylesheet'>
    <meta name='author' content='Elisha Temiloluwa a.k.a TemmyScope' @endif/>
    <meta name='robots' content='index, follow' />
    <link rel='canonical' href='http://' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons' />
    @livewireStyles
  </head>

  <body class="">

    <!-- subsequently smaller layer views can be included here -->

    <!-- Start main-content -->
    <main class="main">

      @yield('content')

    </main>
    
    @livewireScripts
  
  </body>

</html>

