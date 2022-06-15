<div class="bg-white rounded-md">

    @if (isset($category))
        <a href="/categories/{{ $category->id }}">
            <h2 class="font-medium leading-tight text-xl pt-4 pl-4">{{ Str::title($category->name) }}</h2>
        </a>
    @else
        <h2 class="font-medium leading-tight text-xl pt-4 pl-4">{{ Str::title($title) }}</h2>
    @endif

    @include('logged.shop.products.box_data')
</div>
