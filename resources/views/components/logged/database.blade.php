<x-logged>
    <x-slot name="title">
        {{ isset($title) ? $title : 'Online shop' }}
    </x-slot>

    <x-slot name="head">
        {{ isset($head) ? $head : '' }}
    </x-slot>

    <x-slot name="header">
        {{ isset($header) ? $header : '' }}
    </x-slot>

    <x-slot name="main">
        <section class="relative w-full h-full py-5 min-h-screen bg-pink-200">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style="
            background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80');
            ">
                <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
            </div>
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    {{ isset($main) ? $main : '' }}
                </div>
            </div>
        </section>
    </x-slot>

    <x-slot name="footer">
        <script src="{{ asset('js/table.js') }}"></script>
        {{ isset($footer) ? $footer : '' }}
    </x-slot>

</x-logged>