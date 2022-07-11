<div class="flex flex-col">
    @foreach ($shops as $key => $products)
        <div class="bg-red-200 p-2 mt-5 rounded">
            <a href="/shop/view/{{ $key }}" class="font-medium leading-tight text-xl ml-2">
                {{ App\Models\Product::where('id', $key)->first()->name }}
            </a>
            <x-cart.data :products="$products"></x-cart.data>
        </div>
    @endforeach
</div>
