@extends('layouts.nav-top')

@section('title', '管理者用ページ | 編集')

@section('content')
<div style="margin-top: 90px;"></div>
<h2>お知らせを編集</h2>

<form action="{{ route('notices.update', $notice) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>タイトル:</label>
    <input type="text" name="title" value="{{ $notice->title }}" required>
    
    <label>本文:</label>
    <textarea name="body" required>{{ $notice->body }}</textarea>

    <button type="submit" class="btn btn-primary">更新</button>
</form>

@endsection

