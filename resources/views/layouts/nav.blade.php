<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
<div id="tooltip" style="position: absolute; display: none;"></div>

<nav>
    <ul>
        <li class="{{ Request::is('/') ? 'current' : '' }}">
            <a href="{{ url('/') }}">ホーム</a>
        </li>
        <li class="{{ Request::is('map') ? 'current' : '' }}">
            <a href="{{ url('/map') }}">マップ</a>
        </li>
        <li class="{{ Request::is('notifications') ? 'current' : '' }}">
            <a href="{{ url('/notifications') }}">お知らせ</a>
        </li>
        <li>
            <a href="/access">アクセス</a>
        </li>
 
    </ul>
</nav>
    <div class="content">
        @yield('content')
    </div>
      <!-- JavaScriptファイルの読み込み -->
      <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
