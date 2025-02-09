@extends('layouts.nav-top')

@section('title', '管理者用ページ | トップ')

@section('content')
    <h2>{{ $shoppingStreet->name }}のお知らせ一覧</h2>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <a href="{{ route('notices.create') }}" class="btn btn-primary">新規お知らせ作成</a>

    <ul>
        @foreach($notices as $notice)
            <li>
                <h3>{{ $notice->title }}</h3>
                <p>{{ $notice->body }}</p>
                <a href="{{ route('notices.edit', $notice) }}" class="btn btn-secondary">編集</a>
                <form action="{{ route('notices.delete', $notice) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- ログアウトボタン -->
    <div style="margin-top: 20px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning">ログアウト</button>
        </form>
    </div>

@endsection
