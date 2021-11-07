<div>
    <div class=" max-w-full rounded-sm text-center relative">
        <a href="{!! route('category', [ 'category' => $name ])  !!}">
            <img class="h-full" src="{!! cdnizeURL($category->images[0]->src) !!}" alt="" style=" width: 100%;" >
            <h3 class="text-black font-medium text-3xl py-5 underline">
              {!! substr($name, 0, strpos($name, ',')) !!}
            </h3>
          <div class="centered font-extrabold">
            <h1 class="text-4xl">{!! $name !!}</h1>
            <p>Starting at</p>
            <p class="text-4xl">&#8358;{!! $category->price !!}</p>
          </div>
        </a>
    </div>
</div>