<div>
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
                track order
              </a>
            </li>
          </ul>
        </div>

        <div class="lg:order-2 order-3 w-full lg:w-auto borderr">
          <h5 class="footer-accordion uppercase font-medium text-lg">Company</h5>
          <ul class="footer-panel py-1">
            
            <li class="py-2">
              <a href="{!! route('about-us') !!}">
                about
              </a>
            </li>
          </ul>
        </div>

        <div class="lg:order-3 order-4 w-full lg:w-auto borderr">
          <h5 class="footer-accordion uppercase font-medium text-lg">Quick Links</h5>
          <ul class="footer-panel py-1">
            <li class="py-2">
              <a href="#">
                contact us
              </a>
            </li>
          </ul>
        </div>
        
        <div class="lg:w-2/6 lg:order-4 order-1 w-full lg:block flex flex-wrap">
          
          <small class="text-gray-400 order-3">By signing up for email, you agree to Stay Slay Fashion's <a href="{!! route('terms') !!}" class="underline">Terms of Service </a>and <a href="#" class="underline">Privacy policy</a></small>
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
            <span class="px-2" style="display: none">
              <a href="">
                <i class="fab fa-snapchat-ghost footer-gram"></i>
              </a>
            </span>
          </div>
        </div>

      </div>

      <div class="text-white py-6 mt-6">
        <div class="w-navWidth mx-auto foot-border py-5 text-center">
          <span>
            &copy; 2021 Stay Slay Fashion, All Rights Reserved
          </span>
        </div>
      </div>
    </footer>
    <!-- end of footer section -->
            
    @endif
    
</div>