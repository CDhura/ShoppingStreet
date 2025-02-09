<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウトしました</title>
</head>

<body class="home">
    <x-nav-top />

    <div class="logout-container">
        <h1 class="logout-message">ログアウトしました！</h1>
        <div class="button-container">
            <a href="{{ route('index') }}" class="btn">トップページへ</a>
            <a href="{{ route('login') }}" class="btn">ログイン画面へ</a>
        </div>
    </div>

</body>
</html>
