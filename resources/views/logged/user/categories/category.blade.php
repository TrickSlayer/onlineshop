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
                    
                    <x-sort :title="'Price:'" :name="'sale_price'" :sort="$sortprice">
                    </x-sort>

                    <x-product.data-list :wrap="'wrap'" :data="['title' => $category->name, 'products' => $products]" :_size="$size">
                        <x-slot name="slot">
                            <div class="pb-5">
                                <input type="hidden" value="1" id="page">
                                <a class="font-semibold ml-10 text-lg" onclick="loadMore()">
                                    Load More
                                </a>
                            </div>
                        </x-slot>
                    </x-product.data-list>

                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <script src="{{ asset('js/loadmore.js') }}"></script>
    </x-slot>
</x-logged>
