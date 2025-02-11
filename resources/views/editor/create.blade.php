@extends('layouts.mypage')

@section('title', 'お知らせ新規作成')

@section('content')
<h1 class="title">
    新規お知らせ作成
</h1>

<div>
    <form action="{{ route('notices.store') }}" method="POST" onsubmit="return confirmCreate();">
    @csrf
        <div class="create-form-group">
            <label for="title">タイトル:</label>
            <input type="text" name="title" id="title" class="create-form-control" required>
        </div>
        <div class="create-form-group">
            <label for="body">本文:</label>
            <textarea name="body" id="body" class="create-form-control large-textarea" required></textarea>
        </div>
        <button type="submit" class="notice-create-button2">追加</button>
    </form>
</div>

<div class="custom-button">
    <a href="{{ route('mypage') }}" >
        管理者用ページに戻る
    </a>
</div>

@endsection

