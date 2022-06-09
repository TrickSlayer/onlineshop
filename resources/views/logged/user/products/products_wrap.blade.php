<div class="bg-white rounded-md">
    <a href="/categories/{{ $category->id }}">
        <h2 class="font-medium leading-tight text-xl pt-4 pl-4">{{ Str::title($category->name) }}</h2>
    </a>
    <div class="flex flex-wrap overflow-hidden">
        @foreach ($products as $product)
            <a href="/products/{{ $product->id }}" class="m-4">
                <div class="box-border h-72 w-52 p-4 border-4 justify-center rounded-md">
                    <div class="box-border h-40 w-40 border-1 mx-auto">
                        <img class="object-cover w-full h-full" src="{{ $product->thumb }}">
                    </div>
                    <div class="box-border h-16 w-40 border-1 truncate mx-auto">
                        <h2 class="mt-1 font-medium leading-tight text-base mb-2">{{  Str::title($product->name) }}</h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>