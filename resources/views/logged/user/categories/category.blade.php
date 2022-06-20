<x-logged :title="$category->name">
    <x-slot name="main">
        <div class="w-full px-4 mt-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-100 rounded">
                <div class="flex flex-wrap overflow-hidden">
                    <div class="box-border h-96 w-96 border-1 m-4">
                        <img class="object-cover w-full h-full" src="{{ $category->thumb }}">
                    </div>
                    <div class="box-border border-1 text-ellipsis m-4 flex-1">

                        <h2 class="font-medium leading-tight text-2xl mt-0 mb-2">Name:
                            {{ Str::title($category->name) }}
                        </h2>

                        <h2 class="font-medium leading-tight text-2xl mt-0 mb-2 ">Description: </h2>
                        <p>{{ $category->description }}</p>

                        <h2 class="font-medium leading-tight text-2xl mt-0 mb-2 ">Content: </h2>
                        {!! $category->content !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full px-4 mt-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-100 rounded">
                <div class="m-4">
                    <h2 class="font-medium leading-tight text-xl mt-0 mb-2 ">Products: </h2>

                    <a href="{{ request()->url() }}">Default</a><br>
                    <a href="{{ request()->fullUrlWithQuery(['sale_price' => 'asc']) }}">Price Low to High</a><br>
                    <a href="{{ request()->fullUrlWithQuery(['sale_price' => 'desc']) }}">Price High to Low</a>

                    {{-- @include('logged.shop.products.box_products') --}}
                    <x-product.data-list :wrap="'wrap'" :data="['category' => $category, 'products' => $products]" 
                        :_size="$size">
                    </x-product.data-list>

                    <div>
                        <input type="hidden" value="1" id="page">
                        <a onclick="loadMore()">
                            Load More
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <script src="{{ asset('js/loadmore.js') }}"></script>
    </x-slot>
</x-logged>
