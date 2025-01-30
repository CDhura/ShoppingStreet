@extends('layouts.nav')

@section('title', 'マップページ')

@section('content')

<h1 class="tytle">A商店街 イラストMAP</h1>
<p class="invite2">気になるお店のアイコンをクリック！
    <br>各お店の詳細ページに飛べます
</p>
<img class="center_img" src="{{ asset('img/arcade2.png') }}" usemap="#storemap" alt="Store Map" width="100%">
<map name="storemap">
    <area shape="rect" coords="1005,277,8051230,467" href="{{ route('map.butcher') }}" alt="butcher" data-tooltip="お肉屋 #お肉 #コロッケ">
    <area shape="rect" coords="770,140,987,340" href="{{ route('map.shuttered1') }}" alt="shuttered Shop1" data-tooltip="シャッター店 #新店舗募集中">
    <area shape="rect" coords="505,0,738,197" href="{{ url('/coming') }}" alt="shuttered Shop1" data-tooltip="花屋～離島花屋～ #きれいなお花売ってます">
    <area shape="rect" coords="90,236,313,422" href="{{ url('/coming') }}" alt="shuttered Shop1" data-tooltip="八百屋～橘～ #産地直送">
    <area shape="rect" coords="328,391,526,583" href="{{ url('/coming') }}" alt="shuttered Shop1" data-tooltip="魚屋～錦魚～ #〆鯖あります">
    <area shape="rect" coords="591,508,811,703" href="{{ route('map.shuttered1') }}" alt="shuttered Shop1" data-tooltip="シャッター店 #新店舗募集中">
</map>
@endsection
