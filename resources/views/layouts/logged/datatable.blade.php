@extends('layouts.logged')

@section('body')
    <section class="relative w-full h-full py-5 min-h-screen bg-pink-200">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80');
            ">
            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
        </div>
        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                @yield('content')
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script src="{{ asset('js/table.js') }}"></script>
@endsection
