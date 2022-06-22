<x-logged.form :title="'Create Product'">

    <x-slot name="main">
        <div class="w-full lg:w-8/12 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="mt-5">
                        <x-alert></x-alert>
                    </div>
                    <form action="create" method="post" enctype="multipart/form-data">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">
                                Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">
                                Quantity</label>
                            <input type="number" name="quantity" value="{{ old('quantity') }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2">Category</label>
                            <select name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0" selected>Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (old('category_id') == $category->id) @selected(true) @endif>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">
                                Price</label>
                            <input type="number" min="0" name="price" value="{{ old('price') ?: 0 }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">
                                Sale Price</label>
                            <input type="number" min="0" name="sale_price"
                                value="{{ old('sale_price') ?: 0 }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Short
                                description</label>
                            <textarea name="description"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ old('description') }}</textarea>
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Detail</label>
                            <textarea name="content" id="content"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ old('content') }}</textarea>
                        </div>

                        <div class="flex">
                            <div>
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    for="grid-password">Active</label>
                                <div class="form-check inline-block">
                                    <input
                                        class="form-check-input rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="active" value="1" checked>
                                    <label class="form-check-label inline-block text-gray-800">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check inline-block">
                                    <input
                                        class="form-check-input rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="active" value="0">
                                    <label class="form-check-label inline-block text-gray-800">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Picture</label>
                            <input type="file" id="upload" name="file" value="{{ old('file') }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                            <div class="mt-2" id="image_show">
                            </div>
                            <input type="hidden" name="thumb" id="file" value="{{ old('thumb') }}">
                        </div>

                        <div class="text-center mt-6">
                            <button
                                class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                type="submit">
                                Create
                            </button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </x-slot>

</x-logged.form>
