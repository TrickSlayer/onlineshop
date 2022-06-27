<x-logged.form :title="'Create Product'">

    <x-slot name="main">
        <div class="w-full lg:w-8/12 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="mt-5">
                        <x-alert></x-alert>
                    </div>
                    <form action="register" method="post" enctype="multipart/form-data">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">
                                Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Detail</label>
                            <textarea name="content" id="content"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ old('content') }}</textarea>
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">
                                Address</label>
                            <input type="text" name="address" value="{{ old('address') }}" id="address-input" placeholder="Enter Address"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                            <div id="address-map">
                            </div>
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Avatar</label>
                            <input type="file" id="upload" name="file" value="{{ old('file') }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                            <div class="mt-2" id="image_show">
                            </div>
                            <input type="hidden" name="thumb" id="file" value="{{ old('thumb') }}">
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Background</label>
                            <input type="file" id="upload1" name="file1" value="{{ old('file1') }}"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                            <div class="mt-2" id="image_show1">
                            </div>
                            <input type="hidden" name="thumb1" id="file1" value="{{ old('thumb1') }}">
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

                        <div class="text-center mt-6">
                            <button
                                class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                type="submit">
                                Register
                            </button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <script src="{{ asset('/js/mapInput.js') }}"></script>
    </x-slot>

</x-logged.form>
