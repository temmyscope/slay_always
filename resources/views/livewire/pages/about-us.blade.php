@section('title', 'About Us')
@section('description', 'Welcome to StaySlay - Fashion. About us')
@section('keywords', 'About us, Stay, Slay, Fashion')

<div>
    
    <!-- nav section -->
    <nav class="w-full mt-6">
        <ul class="w-navWidth flex mx-auto">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('welcome') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          About us
        </li>
        </ul>
    </nav>

    <!-- banner image  -->
    <div class="w-full fam bg-yellow-400">
      <img src="{!! asset('/assets/images/family.jpg') !!}" alt="" >
    </div>
  
    <main class="w-full mt-9">
      <div class="lg:w-1/2 w-navWidth mx-auto">
        <div class="py-6 text-center">
          <h1 class="capitalize font-bold text-4xl">obsessed with staying slay fashion.</h1>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
          <div class="">
            <img src="https://images.pexels.com/photos/6939173/pexels-photo-6939173.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" class="">
          </div>
          <div class="">
            <h3 class="font-bold text-xl">About Us</h3>
            <p class="mt-2">
              StaySlay Fashion is the world’s leading quick-to-market apparel and lifestyle brand. We are renowned for delivering the season’s most wanted styles to millions of people worldwide, which earned us the title of the #1 Most-Searched Fashion Brand on Google in 2018.
            </p>
            <p class="mt-5">
              As a Los Angeles based company with 5 retail stores throughout Southern California, we sell collections for women, men, curve, and kids. We are a pop culture phenomenon, reaching staggering social media followings of over 25 million, of which includes celebrity fans and collaborators.
            </p>
            <p class="mt-5">
              Our name has been featured in songs and our styles have been worn by your favorite celebs. From Cardi B to Kylie Jenner, there isn’t a famous booty our jeans haven’t been on. Tyga, The Game, YG, City Girls, Saweetie, Offset—you’ll hear Fashion Nova mentioned in the hottest chart-topping hits, worldwide.
            </p>
          </div>
  
          <div class="">
            <h3 class="font-bold text-xl">Our Mission</h3>
            <p class="mt-2">
              Fashion Nova is the world’s leading quick-to-market apparel and lifestyle brand. We are renowned for delivering the season’s most wanted styles to millions of people worldwide, which earned us the title of the #1 Most-Searched Fashion Brand on Google in 2018.
            </p>
            <p class="mt-5">
              As a Los Angeles based company with 5 retail stores throughout Southern California, we sell collections for women, men, curve, and kids. We are a pop culture phenomenon, reaching staggering social media followings of over 25 million, of which includes celebrity fans and collaborators.
            </p>
            <p class="mt-5">
              Our name has been featured in songs and our styles have been worn by your favorite celebs. From Cardi B to Kylie Jenner, there isn’t a famous booty our jeans haven’t been on. Tyga, The Game, YG, City Girls, Saweetie, Offset—you’ll hear Fashion Nova mentioned in the hottest chart-topping hits, worldwide.
            </p>
          </div>
  
          <div class="">
            <img src="https://images.pexels.com/photos/3062616/pexels-photo-3062616.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" class="">
          </div>
  
        </div>
      </div>
    </main>
    
    @livewire('contact-us')

</div>
