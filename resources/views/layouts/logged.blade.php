@extends('layouts.layout')

@section('main')
    @include('layouts.sidebar')
    <div class="relative md:ml-64 bg-blueGray-50">
        @yield('body')
    </div>
@endsection