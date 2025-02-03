<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>空き店舗 - 詳細情報</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .contact-info {
            background: #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .contact-info h2 {
            margin-top: 0;
            color: #007bff;
        }
        .contact-info p {
            margin: 5px 0;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        .map-container {
            text-align: center;
        }
        .map-container img {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body> -->
@extends('layouts.nav')

@section('title', '空き店舗')

@section('map')
<a href="{{ route('shopping-street.map.index', ['name' => 'hidamari']) }}">マップ</a>
@endsection

@section('notifications')
<a href="{{ route('shopping-street.notifications.index', ['name' => 'hidamari']) }}">お知らせ</a>
@endsection

@section('access')
<a href="{{ route('shopping-street.access.index', ['name' => 'hidamari']) }}">アクセス</a>
@endsection

@section('content')
    <div style="background-color: #ffffff;">
        <div style="font-size: 1px">　</div>
        <h1 class='tytle'>空き店舗のお知らせ</h1>
        <hr style="height: 2px; background-color: #C2A366; border: none;">
        <div style="font-size: 1px">　</div>
    </div>

    <p>元中華料理屋なので、キッチン、シンク等完備。<br>内装のリフォームだけで飲食店を始められます。</p>
    
    <div class="map-container">
        <img src="{{ asset('img/kittin.jpg') }}" usemap="#storemap" alt="Store Map" width="400">
    </div>
    
    <hr style="height: 2px; background-color: #C2A366; border: none;">
    
    <div class="">
        <h2 style="text-align: center; background-color: #F5F0E6;">
            お問い合わせはこちら
        </h2>
        <p><strong>連絡先:</strong> 080-1234-5678</p>
        <p><strong>メール:</strong> <a href="mailto:info@example.com">info@example.com</a></p>
        <p><strong>担当:</strong> ×× 不動産</p>
    </div>
    <br>
    <div>
        <a href="{{ url('/map') }}" class="custom-button">イラストMAPに戻る</a>
    </div>


@endsection



<!-- </body>
</html> -->
