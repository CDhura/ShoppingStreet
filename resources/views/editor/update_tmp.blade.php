<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お知らせの編集</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Paddingとボーダーを含むサイズ調整 */
        }
        textarea {
            resize: vertical; /* 縦方向のリサイズを許可 */
            height: 400px; /* 高さを200pxに設定 */
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-messages {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-top: 20px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }
        .back-link a {
            color: #007bff;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>お知らせの編集</h1>

    <!-- フォームの開始 -->
    <form action="{{ route('notifications.update', ['id' => $notification->notification_id]) }}" method="POST">
        @csrf
        <!-- タイトルの入力フィールド -->
        <div>
            <label for="title">タイトル:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $notification->title) }}" required>
        </div>

        <!-- 本文の入力フィールド -->
        <div>
            <label for="body">本文:</label>
            <textarea id="body" name="body" rows="6" required>{{ old('body', $notification->body) }}</textarea>
        </div>

        <!-- 保存ボタン -->
        <div>
            <button type="submit">保存</button>
        </div>
    </form>

    <div class="back-link">
        <a href="{{ route('edit') }}">お知らせ編集ページに戻る</a>
    </div>

    <!-- エラーメッセージがあれば表示 -->
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- JavaScriptがあればここに記述 -->
</body>
</html>
