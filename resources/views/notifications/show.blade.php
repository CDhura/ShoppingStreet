<!-- 通知詳細ページ -->

@extends('layouts.nav')

@section('title', $notification->title)

@section('content')
    <h1 class="tytle">{{ $notification->title }}</h1>
    <div class="right-align">作成日：{{ $notification->created_at->format('Y-m-d') }}</div>
    <div class="right-align">最終更新日：{{ $notification->updated_at->format('Y-m-d') }}</div>
    <div class="notification-body">{{ $notification->body }}</div>

    <hr>
    <div class="container">
        <div class="body">

            @if($nextNotification)
                <a  class="notirink" href="{{ route('notifications.show', ['id'=> $nextNotification->notification_id]) }}">
                    1つ後の記事へ
                </a>
            @else
                <span class="disabled-link">1つ後の記事へ</span>
            @endif
        </div>
        <!-- 一覧に戻るボタン -->
        <div class="body">
            <a href="{{ route('notifications.index') }}" class="notirink">一覧に戻る</a>
        </div>
        <div class="body">

            @if($prevNotification)
                <a class="notirink" href="{{ route('notifications.show', ['id'=> $prevNotification->notification_id]) }}">
                    1つ前の記事へ
                </a>
            @else
            <span class="disabled-link">1つ前の記事へ</span>
            @endif
        </div>
    </div>
@endsection
