@extends('layouts.nav')

@section('title', 'お知らせ管理')
@section('background-image', '/img/shopping-street/' . $name . '/background.jpg')
@section('shopping-street-name', $name)

@section('content')
    <h1 class="title">{{ $shoppingStreet->name }} のお知らせ管理</h1>

    @if(session('success'))
        <p class="alert-success">{{ session('success') }}</p>
    @endif

    <!-- 新規作成ボタン -->
    <div class="notice-edit-button-container">
        <a href="{{ route('notices.create') }}" class="notice-edit-btn notice-edit-btn-primary">
            新規お知らせ作成
        </a>
    </div>

    @if ($notices->isEmpty())
        <p>現在、お知らせはありません。</p>
    @else
        <ul class="news-list">
            @foreach($notices as $notice)
                <li class="item">
                    <div class="notice-content">
                        <p class="date">{{ $notice->created_at->format('Y-m-d') }}</p>
                        <p class="category"><span>お知らせ</span></p>
                        <p class="notice-title">{{ $notice->title }}</p>
                    </div>

                    <!-- 編集・削除ボタン -->
                    <div class="notice-actions">
                        <a href="{{ route('notices.edit', $notice) }}" class="notice-edit-btn notice-edit-btn-secondary">
                            編集
                        </a>

                        <form action="{{ route('notices.delete', $notice) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="notice-edit-btn notice-edit-btn-danger">
                                削除
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- ページネーション -->
        <div class="pagenation-container">
            {{ $notices->links('pagination::bootstrap-4') }}
        </div>
    @endif

    <!-- ログアウトボタン -->
    <div class="notice-edit-logout-container">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="notice-edit-btn notice-edit-btn-warning">ログアウト</button>
        </form>
    </div>
@endsection
