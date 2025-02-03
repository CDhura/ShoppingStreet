<!-- 「お知らせ」のトップ画面 -->
 
@extends('layouts.nav')

@section('title', 'お知らせ')
@section('background-image', '/img/shopping-street/hidamari/background.jpg')
@section('shopping-street-name', $name) 

@section('content')
<h1 class="tytle">商店街からのお知らせ</h1>
<ul class="news-list">
    @foreach($notifications as $notification)
        <!-- <li class="item"><a href='http://localhost/notifications/{{ $notification -> notification_id }}'> -->
        <li class="item">
            <a href="{{ route('shopping-street.notifications.show', ['name' => $name, 'id' => $notification->notification_id]) }}">
                <p class="date">{{ $notification->created_at->format('Y-m-d') }}</p>
                <p class="category"><span>お知らせ</span></p>
                <p class="title">{{ $notification->title }}</p>
            </a>
        </li>
    @endforeach
</ul>
@endsection
