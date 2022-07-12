<x-logged.database>

    <x-slot name="header">
        <style>
            .screen {
                min-height: calc(100vh - 40px);
            }
        </style>

    </x-slot>

    <x-slot name="main">
        <div class="bg-gray-100 rounded w-full p-5 z-10 screen">
            <h2 class="font-medium leading-tight text-2xl">My Cart</h2>
            <x-alert></x-alert>
            <x-cart.data-list :shops="$shops"></x-cart.data-list>

            @if (count($shops) > 0)

                <div class="inline-block font-medium leading-tight text-xl mt-2 w-full text-right">
                    Total: $<p id="total" class="inline"></p>
                </div>

                <div class="relative w-full mb-3">
                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                        for="grid-password">Detail</label>
                    <textarea name="content" id="note"
                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ old('content') }}</textarea>
                </div>

                <div class="relative w-full mb-3">
                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">
                        Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" id="address-input"
                        placeholder="Enter Address"
                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                    <div id="address-map">
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button onclick="order()"
                        class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                        Order
                    </button>
                </div>
            @else
            <div class="w-full h-96">
                <p class="w-full text-center text-gray-300">Have no product</p>
            </div>
                
            @endif


        </div>
    </x-slot>

    <x-slot name="footer">
        <link href="{{ asset('css\inputnumber.css') }}" rel="stylesheet">
        <script src="{{ asset('js\inputnumber.js') }}"></script>
        <script src="{{ asset('/js/mapInput.js') }}"></script>
        <script src="{{ asset('js\cart.js') }}"></script>
    </x-slot>

</x-logged.database>
