<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <title>マイページ</title>
</head>
<body class="scroll-bar page">
    <x-nav-top />
    <div style="margin-top: 90px;">
        <h2>マイページ</h2>
        <p>ようこそ、{{ $editor->username }} さん</p>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    </div>
</body>
</html>

