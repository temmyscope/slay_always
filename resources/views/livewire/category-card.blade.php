<div>
  @if ($category && isset($category[0]))

  <main class="w-full my-8">
    <div class="w-navWidth mx-auto">

      <h1 class="text-center text-4xl font-bold">Categories</h1>

      <div class="grid grid-cols-2 lg:grid-cols-4 my-5 gap-4  w-full">

        
            
          @foreach ($category as $item => $image)
          <div>
            <div class=" max-w-full rounded-sm text-center relative">
                <a href="{!! route('category', [ 'category' => $item ])  !!}">
                    <img class="h-full" src="{!! cdnizeURL($image) !!}" alt="" style=" width: 100%;" >
                    <h3 class="text-black font-medium text-3xl py-5 underline">
                      {!! $item !!}
                    </h3>
                  <div class="centered font-extrabold">
                    <h1 class="text-4xl">{!! $item !!}</h1>
                  </div>
                </a>
            </div>
          </div>    
          @endforeach

      </div>

    </div>
  </main>

  @endif
</div>