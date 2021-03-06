<x-logged.database :title="'List Categories'">

    <x-slot name="main">
        <div class="w-full px-4 mt-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white rounded">
                <div class="my-5 ml-6">
                    <label class="font-medium">Search</label>
                    <input type="text" id="filter" name="filter" placeholder="Category name..."
                        class="border-2 border-gray-300 p-1 rounded" value="{{ $filter ?: $request->value }}">
                </div>
                <div id="table">
                    @include('logged.admin.categories.table')
                </div>
            </div>
        </div>
    </x-slot>

</x-logged.database>
