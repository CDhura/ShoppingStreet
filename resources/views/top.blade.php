<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>地域商店街応援サイト<br>ジモマップ</title>
    <style>
.background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("{{ asset('img/arcade.png') }}");
    background-size: cover;
    background-position: center;
    filter: blur(5px);
    z-index: -1;
    transition: opacity 1s ease-in-out, filter 1s ease-in-out;
}

.white-bg {
    opacity: 0.3; /* 背景の透明度を下げる */
    filter: blur(2px); /* ぼかし効果を減少させる */
}

.content {
    position: relative;
    z-index: 1;
}

.home {
    height: 100%;
    background-attachment: fixed;
}

.title3 {
    font-size: 150px;
    padding-top: 150px;
    padding-bottom: 300px;
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
}
.scroll-indicator {
    text-align: center;
    font-size: 50px;
    color: red; /* タイトルと同じ色を使用 */
    margin-top: -250px; /* タイトルとの間隔を調整 */
    animation: bounce 2s infinite; /* スクロールを促すアニメーション */
    text-shadow:
    2px 2px 0 #fff,
    -2px 2px 0 #fff,
    2px -2px 0 #fff,
    -2px -2px 0 #fff,
    2px 0 0 #fff,
    -2px 0 0 #fff, 0 2px 0 #fff,
    0 -2px 0 #fff;
}


@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}
.syou{
    color: #000;
}
    </style>
</head>

<body class="home">
    <div class="background"></div>

    <div id="tooltip" style="position: absolute; display: none;"></div>

    <nav>
    <ul>
        <li class="{{ Request::is('/') ? 'current' : '' }}">
            <a href="{{ url('/') }}">トップ</a>
        </li>
        <li class="dropdown">
            <a class="syou">商店街</a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('/home') }}">A商店街</a></li>
                <li><a href="{{ url('/home2') }}">B商店街</a></li>
                <li><a href="{{ url('/home3') }}">C商店街</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ url('/login') }}">管理者ログイン</a>
        </li>
    </ul>
</nav>


    <h1 class="title3">地域商店街応援<br>ジモマップ</h1>

    <p class="scroll-indicator" id="scroll-indicator">下にスクロールしてください</p>

    <p class="invite">  
        日本には地域住民に愛される商店街がいっぱい存在！<br>
        そんな商店街の魅力をそこのあなたにも大紹介！<br>
        あなたの家の近くの商店街も紹介されてるかも・・・？
    </p>

    <p class="invite_top">気になる商店街を選んで下のボタンをクリック！！</p>
    

    <div class="slideshow-container">
        <div class="slide">
            <img src="{{ asset('img/ShoppingDistrict1.jpg') }}" alt="A商店街" class="slide-image" data-tooltip="～A商店街～">
        </div>
        <div class="slide">
            <img src="{{ asset('img/ShoppingDistrict2.jpg') }}" alt="B商店街（一部準備中）" class="slide-image" data-tooltip="～B商店街（一部準備中）～">
        </div>
        <div class="slide">
            <img src="{{ asset('img/ShoppingDistrict3.jpg') }}" alt="C商店街（準備中）" class="slide-image" data-tooltip="～C商店街（準備中）～">
        </div>

        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>

    
    <div class="button-container">
        <a href="{{ url('/home1') }}" class="btn" id="slide-link">
            <span>この商店街を見る</span>
        </a>
    </div>

    <script>
window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    const scrollIndicator = document.getElementById('scroll-indicator');

    if (scrollPosition > 100) {
        document.querySelector('.background').classList.add('white-bg');
    } else {
        document.querySelector('.background').classList.remove('white-bg');
    }

    // スクロールインジケーターの表示・非表示
    if (scrollPosition > 100) {
        scrollIndicator.style.opacity = '0'; // フェードアウト効果
        scrollIndicator.style.transition = 'opacity 0.5s ease-in-out';
    } else {
        scrollIndicator.style.opacity = '1'; // フェードイン効果
    }
});


    </script>
  <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
