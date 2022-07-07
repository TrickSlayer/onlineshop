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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
            integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/server.js') }}"></script>
        {{ isset($footer) ? $footer : '' }}
    </x-slot>

</x-layout>
