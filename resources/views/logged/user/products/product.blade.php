<x-logged :title='$product->name'>

    <x-slot name="main">
        <div class="w-full px-4 mt-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-100 rounded">
                <h2 class="ml-4 mt-4">
                    <a class="font-bold text-blue-700"
                        href="/categories/view/{{ $product->category->id }}">{{ Str::title($product->category->name) }}</a>
                    > <p class="font-bold text-blue-700 inline">{{ Str::title($product->name) }}</p>
                </h2>
                <div class="flex flex-wrap overflow-hidden">
                    <div class="box-border h-96 w-96 border-1 m-4">
                        <img class="object-cover w-full h-full" src="{{ $product->thumb }}">
                    </div>
                    <div class="box-border border-1 text-ellipsis m-4 flex-1">
                        <h2 class="font-medium leading-tight text-2xl mt-0 mb-2">{{ Str::title($product->name) }}
                        </h2>
    
                        <div class="my-3">
                            <h3 class="inline pr-1 border-r-2">0 <svg class="w-5 h-5 text-yellow-400 inline" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg></h3>
                            <h3 class="inline pr-1 border-r-2">0 comment</h3>
                            <h3 class="inline">0 sale</h3>
                        </div>
    
                        @if ($product->price > $product->sale_price)
                            <div class="inline-block">
                                <h2 class="font-medium leading-tight text-2xl mt-0 mb-2 text-red-500">
                                    <p class="line-through inline">{{ Str::title($product->price) }}$</p> -> <p
                                        class="inline">{{ Str::title($product->sale_price) }}$</p>
                                </h2>
                            </div>
                        @else
                            <h2 class="font-medium leading-tight text-2xl mt-0 mb-2 text-red-500">
                                {{ Str::title($product->price) }}$
                            </h2>
                        @endif
    
                        <div class="custom-number-input h-10 w-32">
                            <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Number
                            </label>
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent my-1">
                                <button data-action="decrement"
                                    class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin"> - </span>
                                </button>
                                <input type="number"
                                    class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700"
                                    name="custom-input-number" value="0">
                                <button data-action="increment"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
    
                        <button class="rounded-full border-2 border-black p-2 mt-10">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="w-full px-4 mt-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-100 rounded">
                <div class="m-4">
                    <h2 class="font-medium leading-tight text-2xl mt-0 mb-2 ">Description: </h2>
                    <p>{{ $product->description }}</p>
                    <h2 class="font-medium leading-tight text-2xl mt-0 mb-2 ">Content: </h2>
                    {!! $product->content !!}
                </div>
            </div>
        </div>
    
        <div class="w-full px-4 mt-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-100 rounded">
                <div class="m-4">
                    <h2 class="font-medium leading-tight text-xl mt-0 mb-2 ">Product Reviews: </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <link href="{{ asset('css\inputnumber.css') }}" rel="stylesheet">
        <script src="{{ asset('js\inputnumber.js') }}"></script>
    </x-slot>

</x-logged>
