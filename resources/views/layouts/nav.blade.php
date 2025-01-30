<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
</head>
<style>
    
.page {
    background-image: url("{{ asset('img/ShoppingDistrict1.jpg') }}");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100%;
    background-attachment: fixed; /* 背景を固定 */
    padding: 0; /* 余白をなくす */
    margin: 0; /* 余白をなくす */
    text-align: center; /* テキストを中央揃え */

    background-color: rgba(255, 255, 255, 0.7); /* 半透明の白を背景色として設定 */
    background-blend-mode: lighten; /* 背景画像と背景色をブレンド */
    overflow: scroll; /*スクロールバーを常に表示 */
}
</style>
<body class="page">
<div id="tooltip" style="position: absolute; display: none;"></div>

<nav>
    <ul>
        <li class="{{ Request::is('/') ? 'current' : '' }}">
            <a href="{{ url('/home') }}">ホーム</a>
        </li>
        <li class="{{ Request::is('map') ? 'current' : '' }}">
            <a href="{{ url('/map') }}">マップ</a>
        </li>
        <li class="{{ Request::is('notifications') ? 'current' : '' }}">
            <a href="{{ url('/notifications') }}">お知らせ</a>
        </li>
        <li class="{{ Request::is('access') ? 'current' : '' }}">
            <a href="{{ url('/access') }}">アクセス</a>
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
