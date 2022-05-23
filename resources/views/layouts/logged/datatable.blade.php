@extends('layouts.logged')

@section('body')
    <section class="relative w-full h-full py-5 min-h-screen bg-pink-200">
        <div class="container mx-auto px-4 h-full">
            <h2 class="px-4 mt-10 font-medium leading-tight text-4xl mb-2 ">@yield('title')</h2>
            <div class="flex content-center items-center justify-center h-full">
                @yield('content')
            </div>
        </div>
    </section>
@endsection

@section("footer")
    <script src="{{ asset("js/table.js") }}"></script>
@endsection
