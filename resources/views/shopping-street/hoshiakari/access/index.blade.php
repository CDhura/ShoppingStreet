@extends('layouts.nav')

@section('title', 'アクセス')
@section('background-image', '/img/shopping-street/' . $name . '/background.jpg')
@section('shopping-street-name', $name) 

@section('content')
    <h1 class='title'>アクセス情報</h1>
    <h2>所在地　：〇〇県〇〇市<br>
    電話番号：0120-xxx-xxx</h2>

    <ul class="left-align">
        <li>電車でお越しの方</li>
        <p>
            〇〇駅から徒歩20分<br>
            〇〇駅から徒歩11分
        </p>
    <li>
        お車でお越しの方
    </li>
    <p>徒歩1分圏内にに複数のパーキングエリアがございます</p></ul>
@endsection