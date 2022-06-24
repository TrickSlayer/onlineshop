@foreach ($categories as $category)
    <a href="/categories/view/{{ $category->id }}" class="m-4">
        <div class="box-border h-{{ $h_box }} w-{{ $w_box }} p-5 justify-center rounded-md">
            <div class="box-border h-{{ $image_size }} w-{{ $image_size }} border-1 mx-auto rounded-full overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ $category->thumb }}">
            </div>
            <div class="box-border h-16 w-full border-1 truncate mx-auto text-center">
                <h2 class="mt-1 font-medium leading-tight text-base mb-2">{{ Illuminate\Support\Str::title($category->name) }}
                </h2>
            </div>
        </div>
    </a>
@endforeach