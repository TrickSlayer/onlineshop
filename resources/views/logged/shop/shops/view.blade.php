<x-logged :title="isset($title) ? $title : 'My Shop'">
    <x-slot name="main">
        <div class="bg-blue-200 min-h-screen">
            <section class="relative block h-96 mb-10">
                <div class="absolute top-0 w-full h-full bg-center bg-cover"
                    style="
                  background-image: url({{ $shop->background ? '"'.asset($shop->background).'"' : 'https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80' }});
                ">
                    <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
                </div>
                <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                    style="transform: translateZ(0px)">
                    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                        <polygon class="text-blue-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </section>

            <section class="relative pt-16 -mt-56 mb-5">
                <div class="container mx-auto px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg ">
                        <div class="px-6" style="min-height: 400px">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                    <div class="h-32 w-32 justify-center -mt-20">
                                        <img alt="..."
                                            src="{{ $shop->avatar ? asset($shop->avatar) : asset('assets/img/defaultStore.jpg') }}"
                                            class="object-cover shadow-xl rounded-full h-full border-none w-full" />
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                    <div class="py-6 px-3 mt-32 sm:mt-0">
                                        <button
                                            class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                            type="button">
                                            Follow
                                        </button>
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blue-600">{{ count($shop->products) }}</span><span
                                                class="text-sm text-blue-400">Products</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blue-600">0</span><span
                                                class="text-sm text-blue-400">Followers</span>
                                        </div>
                                        <div class="lg:mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blue-600">0</span><span
                                                class="text-sm text-blue-400">Stars</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-12">
                                <h3 class="text-4xl font-semibold leading-normal mb-2 text-blue-700">
                                    {{ Illuminate\Support\Str::title($shop->name) }}
                                </h3>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blue-400 font-bold uppercase">
                                    <i class="fas fa-map-marker-alt mr-2 text-lg text-blue-400"></i>
                                    {{ Illuminate\Support\Str::title($shop->address) }}
                                </div>
                            </div>
                            <div class="mt-10 py-10 border-t border-blue-200 text-center">
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full lg:w-9/12 px-4">
                                        <p class="mb-4 text-lg leading-relaxed text-blue-700">
                                            {!! $shop->content !!}
                                        </p>
                                        <a href="#products" class="font-normal text-pink-500">Show more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @foreach ($shop->products->groupBy('category_id') as $products)
                <section id="products" class="relative mt-5 bg-blue-200 pb-5">
                    <div class="container mx-auto px-4">
                        <x-product.data-list :data="['products' => $products, 'title' => $products->first->category->name]" :wrap="'wrap'">
                        </x-product.data-list>
                    </div>
                </section>
            @endforeach

        </div>
    </x-slot>
</x-logged>
