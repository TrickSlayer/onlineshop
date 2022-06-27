@foreach ($products as $product)
    <a href="/products/view/{{ $product->id }}" class="m-4 shadow-xl">
        <div class="box-border h-{{ $h_box }} w-{{ $w_box }} p-4 border-4 justify-center rounded-md">
            <div class="box-border h-{{ $image_size }} w-{{ $image_size }} border-1 mx-auto overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ $product->thumb }}">
                @if ($product->price > $product->sale_price)
                    <div class="bg-red-500 relative bottom-full rounded-bl-full w-3/5 p-2 pl-8" style="left: 40%">
                        <b>- {{ round(100 - ($product->sale_price / $product->price) * 100) }} %</b>
                    </div>
                @endif
            </div>
            <div class="box-border h-16 w-{{ $image_size }} border-1 truncate mx-auto">
                <h2 class="mt-1 font-medium leading-tight text-base mb-2">
                    {{ Illuminate\Support\Str::title($product->name) }}
                </h2>
                <h2 class="font-medium leading-tight text-base mt-0 mb-2 text-red-500">
                    {{ Illuminate\Support\Str::title($product->sale_price) }}$
                </h2>

            </div>
            <div class="box-border h-16 w-{{ $image_size }} border-1 truncate mx-auto">
                <h2 class="mt-1 text-left leading-tight text-base mb-2">0 star | 0 sale
                </h2>
            </div>
        </div>
    </a>
@endforeach
