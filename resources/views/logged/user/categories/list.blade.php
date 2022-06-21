<x-logged :title="'List Categories'">

    <x-slot name="main">
        <div class="w-full px-4 mt-5">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white rounded">
                <div id="table">
                    <x-category.data-list :categories="$categories" :wrap="'wrap'" :size="$size">

                    </x-category.data-list>
                </div>
            </div>
        </div>
    </x-slot>

</x-logged>
