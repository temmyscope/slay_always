<div>
    @if($products && !empty($products) && !$products->empty() )
        <div class="mb-5">
            <section class="w-full mt-20">
                <div class="w-navWidth mx-auto">
                    <h2 class="capitalize py-10 text-3xl lg:text-center">recommended for you</h2>
                </div>
            </section>

            <div class="grid lg:grid-cols-5 gap-3">
                @foreach ($products as $index => $product)
                <livewire:product-card :product="$product" :wire:key="'recom-'.$index.'-'.$product->id" >
                @endforeach
            </div>

        </div>
    @endif
</div>