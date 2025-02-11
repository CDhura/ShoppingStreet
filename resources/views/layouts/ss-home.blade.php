<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default title')</title>
    @php
        use Illuminate\Support\Facades\View;
        $backgroundImage = trim(View::getSections()['background-image'] ?? 'img/default-image.jpg');
        $streetName = trim(View::getSections()['shopping-street-name'] ?? '');
    @endphp
</head>

<body class='home' style="background-image: url('{{ asset($backgroundImage) }}');">
    <x-nav.shopping-street street-name="{{ $name }}"/>
    <h1 class="TITLE"> @yield('title') </h1>
    @yield('content')
</body>

</html>