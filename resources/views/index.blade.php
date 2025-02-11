@extends('layouts.top')
@section('title', '地域商店街応援 ジモマップ')

@section('content')
<h1 class="title3">地域商店街応援<br>ジモマップ</h1>

<p class="scroll-indicator" id="scroll-indicator">下にスクロールしてください</p>

<p class="invite">  
    日本には地域住民に愛される商店街がいっぱい存在！<br>
    そんな商店街の魅力をそこのあなたにも大紹介！<br>
    あなたの家の近くの商店街も紹介されてるかも・・・？
</p>

<p class="invite_top">気になる商店街を選んで下のボタンをクリック！！</p>


<div class="slideshow-container">
    <div class="slide">
        <img src="{{ asset('img/shopping-street/hidamari/background.jpg') }}" alt="陽だまり商店街" class="slide-image" data-tooltip="～陽だまり商店街～">
    </div>
    <div class="slide">
        <img src="{{ asset('img/shopping-street/komorebi/background.jpg') }}" alt="木もれび商店街" class="slide-image" data-tooltip="～木もれび商店街～">
    </div>
    <div class="slide">
        <img src="{{ asset('img/shopping-street/hoshiakari/background.jpg') }}" alt="星あかり商店街" class="slide-image" data-tooltip="～星あかり商店街～">
    </div>

    <button class="arrow prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="arrow next" onclick="changeSlide(1)">&#10095;</button>
</div>

<div class="button-container">
    <a  href="{{ route('shopping-street.show', ['name' => 'hidamari']) }}" 
        class="btn-watch-street" 
        id="slide-link">
        <span>
            この商店街を見る
        </span>
    </a>
</div>

<script src="{{ asset('js/custom.js') }}"></script>

@endsection
