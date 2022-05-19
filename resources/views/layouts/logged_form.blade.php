@extends('layouts.logged')

@section('body')
    <main>
        <section class="relative w-full h-full py-40 min-h-screen">
            <div class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
                style="background-image: url({{ asset('assets/img/register_bg_2.png') }})"></div>
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    @yield('content')
                </div>
            </div>
        </section>
    </main>
@endsection
