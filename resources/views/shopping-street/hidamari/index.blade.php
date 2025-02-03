@extends('layouts.home')
@section('title', '陽だまり商店街')
@section('background-image', 'img/shopping-street/hidamari/background.jpg')

@section('content')
    <p class="invite">
        地元民に愛されて早半世紀<br>
        歴史の町〇〇に根差した昔ながらの商店街<br>
        
        詳しくは下のページから！！
    </p>
    <div class="content2">
        <div class="box_switch">
            <a href="{{ route('shopping-street.map.index', ['name' => $name]) }}">
                <h3>マップ</h3>
                <p>
                    商店街の並びが一目でわかる！<br>
                    かわいいイラストマップ
                </p>
            </a>
        </div>
        <div class="box_switch">
            <a href="{{ route('shopping-street.notices.index', ['name' => $name]) }}">
                <h3>お知らせ</h3>
                <p>
                    商店街には話題がいっぱい！<br>
                    記事を読んで商店街の魅力をもっと知ろう
                </p>
            </a>
        </div>

        <div class="box_switch">
            <a href="{{ route('shopping-street.access.index', ['name' => $name]) }}">
                <h3>アクセス</h3>
                <p>
                    商店街への行き方や近くの駐車場などを紹介！<br>
                    気軽に商店街まで来よう！
                </p>
            </a>
        </div>
    </div>
@endsection

