<!-- 「お知らせ」の詳細画面 -->

@extends('layouts.nav')

@section('title', $notice->title)
@section('background-image', '/img/shopping-street/' . $name . '/background.jpg')
@section('shopping-street-name', $name) 

@section('content')
    <h1 class="tytle">{{ $notice->title }}</h1>
    <div class="right-align">作成日：{{ $notice->created_at->format('Y-m-d') }}</div>
    <div class="right-align">最終更新日：{{ $notice->updated_at->format('Y-m-d') }}</div>
    <hr>
    <div class="notification-body">{!! nl2br(e($notice->body)) !!}</div>

    <hr>
    <div class="container">
        <div class="body">
            @if($nextNotice)
                <a  class="notirink" href="{{ route('shopping-street.notices.show', ['name' => $name, 'id'=> $nextNotice->id]) }}">
                    1つ後の記事へ
                </a>
            @else
                <span class="disabled-link">1つ後の記事へ</span>
            @endif
        </div>
        <!-- 一覧に戻るボタン -->
        <div class="body">
            <a href="{{ route('shopping-street.notices.index', ['name' => $name]) }}" class="notirink">一覧に戻る</a>
        </div>
        <div class="body">
            @if($prevNotice)
                <a class="notirink" href="{{ route('shopping-street.notices.show', ['name' => $name, 'id'=> $prevNotice->id]) }}">
                    1つ前の記事へ
                </a>
            @else
            <span class="disabled-link">1つ前の記事へ</span>
            @endif
        </div>
    </div>
@endsection
