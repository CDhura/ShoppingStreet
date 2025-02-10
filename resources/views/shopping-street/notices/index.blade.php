<!-- 「お知らせ」のトップ画面 -->

@extends('layouts.nav')

@section('title', 'お知らせ')
@section('background-image', '/img/shopping-street/' . $name . '/background.jpg')
@section('shopping-street-name', $name) 

@section('content')
    <h1 class="title">商店街からのお知らせ</h1>

    @if ($notices->isEmpty())
        <p>現在、お知らせはありません。</p>
    @else
        <ul class="news-list">
            @foreach($notices as $notice)
                <li class="item">
                    <a href="{{ route('shopping-street.notices.show', ['name' => $name, 'id' => $notice->id]) }}">
                        <p class="date">{{ $notice->created_at->format('Y-m-d') }}</p>
                        <p class="category"><span>お知らせ</span></p>
                        <p class="notice-title">{{ $notice->title }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <!-- ページネーション -->
        <div class="pagenation-container">
            {{ $notices->links('pagination::bootstrap-4') }}
            <!-- {{ $notices->links('pagination::tailwind') }} -->
        </div>
    @endif
@endsection
