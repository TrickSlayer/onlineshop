@foreach ($products as $product)
    <a href="/products/view/{{ $product->id }}" class="m-4">
        <div class="box-border h-{{ $h_box }} w-{{ $w_box }} p-4 border-4 justify-center rounded-md">
            <div class="box-border h-{{ $image_size }} w-{{ $image_size }} border-1 mx-auto">
                <img class="object-cover w-full h-full" src="{{ $product->thumb }}">
            </div>
            <div class="box-border h-16 w-{{ $image_size }} border-1 truncate mx-auto">
                <h2 class="mt-1 font-medium leading-tight text-base mb-2">{{ Str::title($product->name) }}
                </h2>
                @if ($product->price > $product->sale_price)
                    <div class="inline-block">
                        <h2 class="font-medium leading-tight text-base mt-0 mb-2 text-red-500">
                            <p class="line-through inline">{{ Str::title($product->price) }}$</p> -> <p
                                class="inline">{{ Str::title($product->sale_price) }}$</p>
                        </h2>
                    </div>
                @else
                    <h2 class="font-medium leading-tight text-base mt-0 mb-2 text-red-500">
                        {{ Str::title($product->price) }}$
                    </h2>
                @endif

            </div>
            <div class="box-border h-16 w-{{ $image_size }} border-1 truncate mx-auto">
                <h2 class="mt-1 text-left leading-tight text-base mb-2">0 star | 0 sale
                </h2>
            </div>
        </div>
    </a>
@endforeach
