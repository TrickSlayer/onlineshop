<x-logged.database :title="'List Products'">

    <x-slot name="main">
    <div class="w-full px-4 mt-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white rounded">
            <div class="my-5 ml-6">
                <label class="font-medium">Search</label>
                <input type="text" class="" id="filter" name="filter" placeholder="Category name..."
                    value="{{ $filter ?: $request->input("value") }}">
            </div>
            <div id="table">
                @include('logged.shop.products.table')
            </div>
        </div>
    </div>
</x-slot>

</x-logged.database>
