<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者用ページ</title>
</head> 

<body class="mypage">
    <div class="background"></div>
    <x-nav-top />
        
    <!-- <div class="notice-edit-container"> -->
    <div class="content">
        <h1 class="title">
            {{ $shoppingStreet->name }} のお知らせ管理ページ
        </h1>

        @if(session('success'))
            <p class="text-green-500">{{ session('success') }}</p>
        @endif

        <!-- お知らせ作成ボタン -->
        <div class="mypage-button">
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
                    <li class="item">
                        <a href="{{ route('shopping-street.notices.show', ['name' => $name, 'id' => $notice->id]) }}">
                            <p class="date">{{ $notice->created_at->format('Y-m-d') }}</p>
                            <p class="category"><span>お知らせ</span></p>
                            <p class="notice-title">{{ $notice->title }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
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
            <div class="pagination-container">
                {{ $notices->links('pagination::bootstrap-4') }}
            </div>
        @endif

        <!-- ログアウトボタン -->
        <!-- <div class="notice-edit-logout-container"> -->
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <!-- <button type="submit" class="notice-edit-btn notice-edit-btn-warning"> -->
                <button type="submit">
                    ログアウト
                </button>
            </form>
        </div>
    </div>
</body>
</html>
