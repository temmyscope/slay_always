<div class="bg-white rounded-md min-w-odd flex-shrink-0 p-1 lg:p-0 nav-height">
  <div class="py-1 w-full">
    <ul class="capitalize">
      <li 
        class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4 {!! ($active==='profile')?'active': '' !!}"
      >
        <a href="{!! route('profile') !!}">
          <span class="far fa-user lg:px-3 px-1"></span>
        my slay account
        </a>
      </li>

      <li 
        class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4 {!! ($active==='orders')?'active': '' !!}"
      >
        <a href="{!! route('order-history') !!}">
          <span class="fas fa-shopping-bag lg:px-3 px-1"></span>
        order history
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="{!! route('saved') !!}">
          <span class="far fa-heart lg:px-3 px-1"></span>
        saved items
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="">
          <span class="far fa-edit lg:px-3 px-1"></span>
        pending review
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="">
          <span class="far fa-envelope lg:px-3 px-1"></span>
        inbox
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="../recently-viewed.html">
          <span class="fas fa-history lg:px-3 px-1"></span>
        recently viewed
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="">
          <span class="fas fa-info lg:px-3 px-1"></span>
        add info
        </a>
      </li>
    </ul>
    <div class="cursor-pointer hover:bg-gray-300 py-3 text-center text-xl border-t-2 border-gray-200 border-solid text-slayText font-bold mt-16">
        <button>
          <span class="fas fa-sign-out-alt px-1"></span>
            logout
        </button>
    </div>
  </div>
</div>