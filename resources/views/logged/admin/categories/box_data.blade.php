<div id="load"
    @if (isset($wrap)) class="flex overflow-hidden flex-wrap"
    @else
    class="flex overflow-hidden flex-nowrap" @endif>
    @foreach ($categories as $category)
        <a href="/categories/{{ $category->id }}" class="m-4">
            <div class="box-border h-32 w-32 p-5 justify-center rounded-md">
                <div class="box-border h-20 w-20 border-1 mx-auto rounded-full overflow-hidden">
                    <img class="object-cover w-full h-full" src="{{ $category->thumb }}">
                </div>
                <div class="box-border h-16 w-full border-1 truncate mx-auto text-center">
                    <h2 class="mt-1 font-medium leading-tight text-base mb-2">{{ Str::title($category->name) }}
                    </h2>
                </div>
            </div>
        </a>
    @endforeach
</div>
