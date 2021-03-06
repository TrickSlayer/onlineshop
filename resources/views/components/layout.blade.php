<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fortawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <title>{{ isset($title) ? $title : 'Online shop' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/icon.png') }}" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/49dcd2e6d5.js" crossorigin="anonymous"></script>
    {{ isset($head) ? $head : '' }}
</head>

<body>

    <header>
        {{ isset($header) ? $header : '' }}
    </header>

    <main>
        {{ isset($main) ? $main : '' }}
    </main>

    <footer>
        {{ isset($footer) ? $footer : '' }}
    </footer>


    <script src="{{ asset('js/url.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

</body>

</html>
