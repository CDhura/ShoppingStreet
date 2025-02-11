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

        .notice-edit-container {
            max-width: 800px;
            margin: 50px auto; /* 上部と下部に余白を追加し、中央配置 */
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: left; /* 左揃えに変更 */
        }

        .notice-edit-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .notice-edit-body {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
            word-wrap: break-word; /* 文字がはみ出さないように改行 */
        }

        .notice-edit-list {
            list-style: none;
            padding: 0;
        }

        .notice-edit-card {
            background: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 5px solid #C2A366;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .notice-edit-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .notice-edit-btn {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            transition: 0.3s;
        }

        .notice-edit-btn-primary {
            background-color: #007bff;
            color: white;
        }

        .notice-edit-btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .notice-edit-btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .notice-edit-btn-warning {
            background-color: #ffc107;
            color: white;
        }

        .notice-edit-btn:hover {
            opacity: 0.8;
        }

        .notice-edit-logout-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body class="page">
    <div class="background"></div>
    <div id="tooltip" style="position: absolute; display: none;"></div>
    <x-nav-top />

    <div class="notice-edit-container">
        <h2>{{ $shoppingStreet->name }} のお知らせ一覧</h2>

        @if(session('success'))
            <p class="text-green-500">{{ session('success') }}</p>
        @endif

        <!-- お知らせ作成ボタン -->
        <div class="notice-edit-button-container">
            <a href="{{ route('notices.create') }}" class="notice-edit-btn notice-edit-btn-primary">
                新規お知らせ作成
            </a>
        </div>

        <!-- お知らせ一覧と, 編集・削除ボタン -->
        <ul class="notice-edit-list">
            @foreach($notices as $notice)
                <li class="notice-edit-card">
                    <h3 class="notice-edit-title">{{ $notice->title }}</h3>
                    <p class="notice-edit-body">{{ $notice->body }}</p>

                    <div class="notice-edit-actions">
                        <!-- 編集ボタン -->
                        <a href="{{ route('notices.edit', $notice) }}" class="notice-edit-btn notice-edit-btn-secondary">
                            編集
                        </a>

                        <!-- 削除ボタン -->
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

        <!-- ログアウトボタン -->
        <div class="notice-edit-logout-container">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="notice-edit-btn notice-edit-btn-warning">ログアウト</button>
            </form>
        </div>
    </div>
</body>
</html>
