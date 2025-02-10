<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者用ページ</title>
    <style>
        .page {
            background-image: url("{{ asset('img/arcade.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            background-attachment: fixed; /* 背景を固定 */
            padding: 0; /* 余白をなくす */
            margin: 0; /* 余白をなくす */
            text-align: center; /* テキストを中央揃え */

            background-color: rgba(255, 255, 255, 0.7); /* 半透明の白を背景色として設定 */
            background-blend-mode: lighten; /* 背景画像と背景色をブレンド */
            overflow: scroll; /*スクロールバーを常に表示 */
        }
        .TITLE {
            font-family: 'HG行書体'; /* 行書体フォント */
            font-size: 90px;
            padding-top: 40px;
            text-align: center;
            color: #F5EFE6;
            text-shadow:
            2px 2px 0 #000,
            -2px 2px 0 #000,
            2px -2px 0 #000,
            -2px -2px 0 #000,
            2px 0 0 #000,
            -2px 0 0 #000, 0 2px 0 #000,
            0 -2px 0 #000;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head> 

<body class="page">
    <div class="background"></div>
    <div id="tooltip" style="position: absolute; display: none;"></div>
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
        <div class="notice-edit-button-container">
            <a href="{{ route('notices.create') }}" class="btn btn-primary">
                新規お知らせ作成
            </a>
        </div>

        <!-- お知らせ一覧と, 編集・削除ボタン -->
        <ul class="notice-edit-list">
            @foreach($notices as $notice)
                <li class="notice-edit-card">
                    <h3 class="notice-edit-title">{{ $notice->title }}</h3>
                    <p class="notice-edit-body">{{ $notice->body }}</p>

                    <!-- 編集ボタン -->
                    <a href="{{ route('notices.edit', $notice) }}" class="notice-edit-btn notice-edit-btn-secondary">
                        編集
                    </a>

                    <!-- 削除ボタン -->
                    <form action="{{ route('notices.delete', $notice) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="notice-edit-btn notice-edit-btn-danger">
                            削除
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>

        <!-- ログアウトボタン -->
        <!-- <div style="margin-top: 20px;"> -->
        <div class="notice-edit-logout-container">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="notice-edit-btn notice-edit-btn-warning">ログアウト</button>
            </form>
        </div>    
    </div>
</body>
</html>
