@extends('layouts.mypage')

@section('title', '管理者用ページ')

@section('content')
    <h1 class="title">
        {{ $shoppingStreet->name }} のお知らせ管理ページ
    </h1>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <!-- お知らせ作成ボタン -->
    <div class="notice-create-button">
        <a href="{{ route('notices.create') }}">
            新規お知らせ作成
        </a>
    </div>
    <div style="margin-top: 40px;">

    <!-- お知らせ一覧と, 編集・削除ボタン -->
    @if ($notices->isEmpty())
        <p>現在、お知らせはありません。</p>
    @else
        <ul class="news-list">
            @foreach($notices as $notice)
                <li class="item admin-notice">
                    <!-- お知らせ詳細のリンク -->
                    <a href="{{ route('notices.admin-show',['notice' => $notice]) }}"> 
                        <p class="date">{{ $notice->created_at->format('Y-m-d') }}</p>
                        <p class="category"><span>お知らせ</span></p>
                        <p class="notice-title">{{ $notice->title }}</p>
                    </a>
                </li>
                    
                <!-- 編集・削除ボタン -->
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
            @endforeach
        </ul>

        <!-- ページネーション -->
        <div class="pagination-container">
            {{ $notices->links('pagination::bootstrap-4') }}
        </div>
    @endif

    <!-- ログアウトボタン -->
    <!-- <div class="notice-edit-logout-container"> -->
    <div>
        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirmLogout();">
            @csrf
            <!-- <button type="submit" class="notice-edit-btn notice-edit-btn-warning"> -->
            <button type="submit" class="logout-button">
                ログアウト
            </button>
        </form>
    </div>
@endsection