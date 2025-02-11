@extends('layouts.ss-detail')

@section('title', '佐々木バーガー')
@section('background-image', '/img/shopping-street/hidamari/background.jpg')
@section('shopping-street-name', 'hidamari')

@section('content')


    <h1 class='title'>佐々木バーガー</h1>
    <p>メニューはこちら</p>
    <ul>
        <li>ハンバーガー</li>
        <li>チーズインバーガー</li>
        <li>佐々木スペシャルバーガー</li>
    </ul>

    <h2>地元の皆さんにも愛されるOO商店街の名物<br>
    皆さんも是非一度食べに来てください！！
    <img src="{{ asset('img/sasaki.jpeg') }}" usemap="#storemap" alt="Store Map" width=1200>

    <x-transition.back-to-map name="{{ $name }}" />

@endsection