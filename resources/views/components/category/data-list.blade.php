<div class="bg-white rounded-md">
    <a href="/categories/list">
        <h2 class="font-medium leading-tight text-xl pt-4 pl-4">Categories</h2>
    </a>
    
    <div id="load" class="flex overflow-hidden flex-{{ $wrap }}">
        <x-category.data :categories="$categories" :size="$size">
        </x-category.data>
    </div>
</div>
