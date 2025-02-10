@extends('layouts.nav')

@section('title', '空き店舗')
@section('background-image', '/img/shopping-street/hidamari/background.jpg')
@section('shopping-street-name', 'hidamari')

@section('content')
    <div style="background-color: #ffffff;">
        <div style="font-size: 1px">　</div>
        <h1 class='title'>空き店舗のお知らせ</h1>
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
        <a href="{{ route('shopping-street.map.index', ['name' => 'hidamari']) }}" class="custom-button">イラストMAPに戻る</a>
    </div>


@endsection



<!-- </body>
</html> -->
