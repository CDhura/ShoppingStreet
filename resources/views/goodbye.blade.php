@extends('layouts.nav-top')
@section('title', 'ログアウト')

@section('content')

<div class="logout-container">
    <h1 class="logout-message">ログアウトしました！</h1>
    <div class="button-container">
        <a href="{{ route('index') }}" class="btn">トップページへ</a>
        <a href="{{ route('mypage') }}" class="btn">管理者用ページへ</a>
    </div>
</div>

@endsection

