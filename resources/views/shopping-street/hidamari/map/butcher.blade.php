@extends('layouts.nav')

@section('title', 'お肉屋')
@section('background-image', '/img/shopping-street/hidamari/background.jpg')
@section('shopping-street-name', 'hidamari')

@section('content')
    <div style="background-color: #ffffff;">
        <div style="font-size: 1px">　</div>
        <h1 class='title'>お肉屋</h1>
        <hr style="height: 2px; background-color: #C2A366; border: none;">
        <div style="font-size: 1px">　</div>
    </div>
    <h3 style="text-align: center;">
        地元の皆さんにも愛される陽だまり商店街の名物！<br>
        皆さんも是非一度買いに来てください！！<br>
    </h3>
    
    <hr style="height: 2px; background-color: #C2A366; border: none;">

    <div >
    <h2 style="text-align: center; background-color: #F5F0E6;">
        アクセス
    </h2>
        <!-- <div class="schedule" style="font-size: 20px"> -->
        <div style="font-size: 20px;">
            0120-xxx-xxx<br>
            営業時間：9:00～18:00<br>
            定休日：土曜日
        </div>
        <div class="scheduleAndPicture_item">
            <img src="{{ asset('img/butcher.jpg') }}" usemap="#storemap" alt="Store Map" style="height: 50vh; width: auto;">
        </div>
        
    </div>
    <hr style="height: 2px; background-color: #C2A366; border: none;">

    <h2 style="text-align: center; background-color: #F5F0E6;">
        メニュー（抜粋）
    </h2>
    <div class="menu-box">
        <h3 style="text-align: center;">揚げもの</h3>
        <ul>
            <li style="text-align: left">コロッケ</li>
            <li style="text-align: left">ミンチカツ</li>
            <li style="text-align: left">ハムカツ</li>
            <li style="text-align: left">串カツ</li>
        </ul>
        <h3 style="text-align: center;">肉</h3>
        <ul>
            <li style="text-align: left">とんかつ</li>
            <li style="text-align: left">合挽ミンチ</li>
            <li style="text-align: left">ロースうす切</li>
        </ul>
    </div>
    <div>
        <a href="{{ route('shopping-street.map.index', ['name' => 'hidamari']) }}" class="custom-button">イラストMAPに戻る</a>
    </div>



@endsection