@extends('layouts.nav')

@section('title', '佐々木バーガー')

@section('content')


    <h1 class='tytle'>佐々木バーガー</h1>
    <p>メニューはこちら</p>
    <ul>
        <li>ハンバーガー</li>
        <li>チーズインバーガー</li>
        <li>佐々木スペシャルバーガー</li>
    </ul>

    <h2>地元の皆さんにも愛されるOO商店街の名物<br>
    皆さんも是非一度食べに来てください！！
<img src="{{ asset('img/sasaki.jpeg') }}" usemap="#storemap" alt="Store Map" width=1200>

@endsection