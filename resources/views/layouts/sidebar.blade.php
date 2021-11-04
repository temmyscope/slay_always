<div class="bg-white rounded-md min-w-odd flex-shrink-0 p-1 lg:p-0 nav-height">
  <div class="py-1 w-full">
    <ul class="capitalize">
      <li 
        class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4 {!! ($active==='profile')?'bg-slay': '' !!}"
      >
        <a href="{!! route('user-profile') !!}">
          <span class="far fa-user lg:px-3 px-1"></span>
        my slay account
        </a>
      </li>

      <li 
        class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4 {!! ($active==='orders')?'bg-slay': '' !!}"
      >
        <a href="{!! route('order-history') !!}">
          <span class="fas fa-shopping-bag lg:px-3 px-1"></span>
        order history
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="{!! route('user-favorites') !!}">
          <span class="far fa-heart lg:px-3 px-1"></span>
        saved items
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="{!! route('user-favorites') !!}">
          <span class="far fa-edit lg:px-3 px-1"></span>
        pending review
        </a>
      </li>

      <li class="lg:pl-5 pl-1 cursor-pointer hover:bg-slay hover:text-gray-200 py-4">
        <a href="{!! route('user-recent') !!}">
          <span class="fas fa-history lg:px-3 px-1"></span>
        recently viewed
        </a>
      </li>

      <div class="cursor-pointer hover:bg-gray-300 py-3 text-center text-xl border-t-2 border-gray-200 border-solid text-slayText font-bold mt-16">
        <a href="{!! route('logout') !!}">
        <button>
          <span class="fas fa-sign-out-alt px-1"></span>
            logout
        </button>
        </a>
    </div>
    </ul>
  </div>
</div>