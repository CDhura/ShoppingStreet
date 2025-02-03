<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default title')</title>
    @php
        use Illuminate\Support\Facades\View;
        $backgroundImage = trim(View::getSections()['background-image'] ?? 'img/default-image.jpg');
        $streetName = trim(View::getSections()['shopping-street-name'] ?? '');
    @endphp    
    <style>
        .home {
            height: 100%;
            background-attachment: fixed; /* 背景を固定 */
            overflow: scroll; /*スクロールバーを常に表示 */
            
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
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            filter: blur(5px); /* 背景のみにぼかし効果を適用 */
            z-index: -1; /* 背景をコンテンツの背面に配置 */ 
        }

        .content {
            position: relative;
            z-index: 1;
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

<body class='home'>
    <x-nav street-name="{{ $name }}"/>
    <h1 class="TITLE"> @yield('title') </h1>
    @yield('content')
</body>

</html>