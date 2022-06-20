<div class="bg-white rounded-md">

    @if (isset($category))
        <a href="/categories/{{ $category->id }}">
            <h2 class="font-medium leading-tight text-xl pt-4 pl-4">{{ Str::title($category->name) }}</h2>
        </a>
    @else
        <h2 class="font-medium leading-tight text-xl pt-4 pl-4">{{ Str::title($title) }}</h2>
    @endif

    <div id="load" class="flex overflow-hidden justify-center flex-{{ $wrap }}">
        <x-product.data :products='$products' :size='$size'>
        </x-product.data>
    </div>
</div>
