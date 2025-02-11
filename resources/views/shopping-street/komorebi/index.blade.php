@extends('layouts.ss-home')
@section('title', '木もれび商店街')
@section('background-image', 'img/shopping-street/komorebi/background.jpg')

@section('content')
    <p class="invite">
        〇〇市に位置する賑やかで親しみやすいエリアです。<br>
        地元の食材や日用品が揃う店舗が並び、地域密着型の温かい雰囲気が特徴。<br>
        レトロな魅力とともに、観光やショッピングにぴったりのスポットです。<br>
        詳しくは下のページから！！
    </p>
    <div class="content2">
        <div class="box_switch">
            <a href="{{ route('shopping-street.map.index', ['name' => $name]) }}">
                <h3>マップ（準備中）</h3>
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

