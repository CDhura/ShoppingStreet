<!-- 【管理者用】「お知らせ」の詳細画面 -->

@extends('layouts.mypage')

@section('title', $notice->title)

@section('content')
    <h1 class="title">
        {{ $notice->title }}
    </h1>
    <div class="right-align">
        作成日：{{ $notice->created_at->format('Y-m-d') }}
    </div>
    <div class="right-align">
        最終更新日：{{ $notice->updated_at->format('Y-m-d') }}
    </div>
    <hr>
    <div class="notification-body">
        {!! nl2br(e($notice->body)) !!}
    </div>

    <hr>
    <div class="notice-update-delete">
        <div class="notice-update-button">
            <a href="{{ route('notices.edit', $notice) }}">
                編集
            </a>
        </div>
        <div>
            <form action="{{ route('notices.delete', $notice) }}" method="POST" onsubmit="return confirmDelete();">
                @csrf
                @method('DELETE')
                <button type="submit" class="notice-delete-button">
                    削除
                </button>
            </form>
        </div>
    </div>
    <x-transition.back-to-mypage />

@endsection
