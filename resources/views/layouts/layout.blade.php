<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fortawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <title>@yield('title', 'layout')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>
    @yield('head')
</head>

<body>

    <header>

    </header>

    <main>
        @yield('main')
    </main>

    @yield('footer')

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
