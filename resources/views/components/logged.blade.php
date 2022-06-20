<x-layout>

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
        <x-sidebar></x-sidebar>
        <div class="relative md:ml-64 bg-gray-50">
            {{ isset($main) ? $main : '' }}
        </div>
    </x-slot>

    <x-slot name="footer">
        {{ isset($footer) ? $footer : '' }}
    </x-slot>

</x-layout>
