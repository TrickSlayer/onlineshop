<x-logged>

    <x-slot name="title">
        {{ isset($title) ? $title : 'Online shop' }}
    </x-slot>

    <x-slot name="head">
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        {{ isset($head) ? $head : '' }}
    </x-slot>

    <x-slot name="header">
        {{ isset($header) ? $header : '' }}
    </x-slot>

    <x-slot name="main">
        <section class="relative w-full h-full min-h-screen pt-5">
            <div class="absolute top-0 w-full h-full bg-gray-800 bg-full bg-no-repeat"
                style="background-image: url({{ asset('assets/img/register_bg_2.png') }})"></div>
            <div class="container mx-auto">
                <div class="flex content-center items-center justify-center">
                    {{ isset($main) ? $main : '' }}
                </div>
            </div>
        </section>
    </x-slot>

    <x-slot name="footer">
        @if ($content)
            <script>
                CKEDITOR.replace('content');
            </script>
        @endif

        <script src="{{ asset('js/upload.js') }}"></script>

        {{ isset($footer) ? $footer : '' }}
    </x-slot>

</x-logged>
