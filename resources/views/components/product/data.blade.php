@foreach ($products as $product)
    <a href="/products/view/{{ $product->id }}" class="m-4">
        <div class="box-border h-{{ $h_box }} w-{{ $w_box }} p-4 border-4 justify-center rounded-md">
            <div class="box-border h-{{ $image_size }} w-{{ $image_size }} border-1 mx-auto">
                <img class="object-cover w-full h-full" src="{{ $product->thumb }}">
            </div>
            <div class="box-border h-16 w-{{ $image_size }} border-1 truncate mx-auto">
                <h2 class="mt-1 font-medium leading-tight text-base mb-2">{{ Str::title($product->name) }}
                </h2>
            </div>
        </div>
    </a>
@endforeach
