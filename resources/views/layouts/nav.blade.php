<!-- 
・title（ページタイトル）
・background-image（背景画像）
・shopping-street-name（商店街の名前）
に値を代入. 
例：
@section('title', 'マップページ')
@section('background-image', '/img/shopping-street/hidamari/background.jpg')
@section('shopping-street-name', 'hidamari') 
-->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    
    @php
        use Illuminate\Support\Facades\View;
        $backgroundImage = trim(View::getSections()['background-image'] ?? 'img/default-image.jpg');
        $streetName = trim(View::getSections()['shopping-street-name'] ?? '');
    @endphp    

    <style>
        .page {
            background-image: url("{{ asset($backgroundImage) }}");
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
        .TITLE {
        font-family: 'HG行書体'; /* 行書体フォント */
        font-size: 90px;
        padding-top: 40px;
        text-align: center;
        color: #F5EFE6;
        text-shadow:
        2px 2px 0 #000,
        -2px 2px 0 #000,
        2px -2px 0 #000,
        -2px -2px 0 #000,
        2px 0 0 #000,
        -2px 0 0 #000, 0 2px 0 #000,
        0 -2px 0 #000;
        font-weight: bold;
        text-align: center;
        }
    </style>
</head> 

<body class="page">
    <div id="tooltip" style="position: absolute; display: none;"></div>
    <x-nav street-name="{{ $name }}" />
    
    <div class="content">
        @yield('content')
    </div>
      <!-- JavaScriptファイルの読み込み -->
      <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
