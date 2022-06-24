<div class="bg-white rounded-md">
    @if (!$products->isEmpty())
        @if (isset($category))
            <a href="/categories/view/{{ $category->id }}">
                <h2 class="font-medium leading-tight text-xl pt-4 pl-4">{{ Illuminate\Support\Str::title($category->name) }}</h2>
            </a>
        @else
            <h2 class="font-medium leading-tight text-xl pt-4 pl-4">{{ Illuminate\Support\Str::title($title) }}</h2>
        @endif


        <div id="load" class="flex overflow-hidden justify-center flex-{{ $wrap }}">
            <x-product.data :products='$products' :size='$size'>
            </x-product.data>
        </div>
        {{ $slot }}
    @else
        <h2 class="font-medium leading-tight text-xl py-4 pl-4">Nothing to show</h2>
    @endif

</div>
