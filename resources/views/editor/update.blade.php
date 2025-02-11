@extends('layouts.mypage')

@section('title', 'お知らせ編集')

@section('content')
<h1 class="title">お知らせを編集</h1>

<div>
    <form action="{{ route('notices.update', $notice) }}" method="POST"onsubmit="return confirmUpdate();">
    @csrf
    @method('PUT')
        <div class="create-form-group">
            <label for="title">タイトル:</label>
            <input type="text" name="title" value="{{ $notice->title }}" id="title" class="create-form-control" required>
        </div>
        <div class="create-form-group">
            <label for="body">本文:</label>
            <textarea name="body" id="body" class="create-form-control large-textarea" required>{{ $notice->body }}</textarea>
        </div>
        <button type="submit" class="notice-create-button2">更新</button>
    </form>
</div>

<div class="custom-button">
    <a href="{{ route('mypage') }}" >
        管理者用ページに戻る
    </a>
</div>
@endsection