@extends('layouts.nav-top')

@section('title', '管理者用ページ | 編集')

@section('content')
<div style="margin-top: 90px;"></div>
<h2>新しいお知らせを作成</h2>

<form action="{{ route('notices.store') }}" method="POST">
    @csrf
    <label>タイトル:</label>
    <input type="text" name="title" required>
    
    <label>本文:</label>
    <textarea name="body" required></textarea>

    <button type="submit" class="btn btn-primary">追加</button>
</form>

@endsection

