<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <script src="{{ asset('js/alert.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
</head> 

<body class="mypage">
    <div class="background"></div>
    <x-nav-top />

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
