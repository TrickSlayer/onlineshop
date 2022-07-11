<x-layout>
    <x-slot name="main">
        {{ $ids }}

        <ul>
            @foreach ($products as $message)
                {{ $message }}
            @endforeach
        </ul>

    </x-slot>

    <x-slot name="footer">
    </x-slot>

</x-layout>
