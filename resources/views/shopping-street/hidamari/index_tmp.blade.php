<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A商店街</title>
    <style>
        .home {
            height: 100%;
            background-attachment: fixed; /* 背景を固定 */
            overflow: scroll; /*スクロールバーを常に表示 */
        }
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('img/shopping-street/hidamari/background.jpg') }}");
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
    <div class="background">  </div>
    <nav>
        <ul>
            <li class="{{ Request::is('/') ? 'current' : '' }}">
                <a href="{{ url('/') }}">トップ</a>
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

    <!-- <img src="{{ asset('img/arcade.png') }}" alt="商店街の画像" class="center_img">     -->
    <h1 class="TITLE"> A商店街</h1>
    <p class="invite">
        地元民に愛されて早半世紀<br>
        歴史の町〇〇に根差した昔ながらの商店街<br>
        
        詳しくは下のページから！！
    </p>

    <div class="content2">
        <div class="box_switch">
            <!-- <a href="{{ url('/map') }}"> -->
            <!-- <a href="{{ route('shopping-street.hidamari.map') }}"> -->
            <a href="{{ route('shopping-street.map', ['name' => 'hidamari']) }}">
                <h3>マップ</h3>
                <p>
                    商店街の並びが一目でわかる！<br>
                    かわいいイラストマップ
                </p>
            </a>
        </div>
        <div class="box_switch">
            <!-- <a href="{{ route('shopping-street.hidamari.notifications') }}"> -->
            <a href="{{ route('shopping-street.map', ['name' => 'hidamari']) }}">
                <h3>お知らせ</h3>
                <p>
                    商店街には話題がいっぱい！<br>
                    記事を読んで商店街の魅力をもっと知ろう
                </p>
            </a>
        </div>

        <div class="box_switch">
            <!-- <a href="{{ route('shopping-street.hidamari.access') }}"> -->
            <a href="{{ route('shopping-street.access', ['name' => 'hidamari']) }}">
                <h3>アクセス</h3>
                <p>
                    商店街への行き方や近くの駐車場などを紹介！<br>
                    気軽に商店街まで来よう！
                </p>
            </a>
        </div>
    </div>
  
</body>

</html>