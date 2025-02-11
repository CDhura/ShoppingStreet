@extends('layouts.top')
@section('title', 'ログアウト')

@section('content')

<div class="logout-container">
    <h1 class="logout-message">ログアウトしました！</h1>
    <div class="button-flex">
        <div class="notice-create-button">
            <a href="{{ route('index') }}">トップページへ</a>
        </div>
        <div class="notice-create-button">
            <a href="{{ route('mypage') }}">管理者用ページへ</a>
        </div>
    </div>

</div>

@endsection

