@extends('layouts.ss-home')
@section('title', '星あかり商店街')
@section('background-image', 'img/shopping-street/' . $name . '/background.jpg')

@section('content')
    <p class="invite">
        〇〇の風情を今に伝える、温かみあふれる商店街。<br>
        昔ながらの魅力と新しい活気が交わる、街の憩いの場。<br>  
        
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

