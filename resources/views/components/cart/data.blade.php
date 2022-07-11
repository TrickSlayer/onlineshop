@foreach ($products as $product)
    <div class="bg-gray-200 mt-2 rounded p-4 h-40 flex">
        <img class="object-cover h-full w-64" src="{{ $product->thumb }}">
        <div class="flex-1 ml-5">
            <h2 class="font-medium leading-tight text-2xl">{{ $product->name }}</h2>
            <p>Price: ${{ $product->sale_price }}</p>
            <div class="custom-number-input h-10 w-32 mt-1">
                <label for="quantity" class="w-full text-gray-700 text-sm font-semibold">Number
                </label>
                <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent my-1">
                    <button data-action="decrement"
                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none decrement">
                        <span class="m-auto text-2xl font-thin"> - </span>
                    </button>
                    <input type="number" id="quantity"
                        class="price outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700"
                        name="{{ $product->sale_price }}" value="{{ $product->quantity }}">
                    <button data-action="increment"
                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer increment">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-5">
            <button value="{{ $product->id }}" onclick="deleteCart(this)">
                <i class="fa-solid fa-trash cursor-pointer"></i>
            </button>
        </div>
    </div>
@endforeach
