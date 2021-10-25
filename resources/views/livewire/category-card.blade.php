<div>
    <div class=" max-w-full rounded-sm text-center relative">
        <a href="{!! route('categories', ['category' => $category->name ]) !!}">
            <img class="h-full" src="{!! env('APP_URL').$category->img->img_url !!}" alt="" style=" width: 100%;" >
            <h3 class="text-black font-medium text-3xl py-5 underline">
              {!! substr($category->name, 0, strpos($category->name, ',')) !!}
            </h3>
          <div class="centered font-extrabold">
            <h1 class="text-4xl">{!! $category->name !!}</h1>
            <p>Starting at</p>
            <p class="text-4xl">&#8358;{!! $category->startingPrice !!}</p>
          </div>
        </a>
    </div>
</div>