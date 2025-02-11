<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">

</head>
<body class="login-body">
    <x-nav.top />

    <div class="login-container">
        <h2>管理者ログイン</h2>

        @if($errors->has('login_error'))
            <p class="error-message">{{ $errors->first('login_error') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-form-group">
                <label for="username" class="form-bold">ユーザー名</label>
                <input type="text" class="login-input" id="username" name="username" required>
            </div>

            <div class="login-form-group">
                <label for="password" class="form-bold">パスワード</label>
                <input type="password" class="login-input" id="password" name="password" required>
            </div>

            <button type="submit" class="custom-button">ログイン</button>
        </form>
    </div>

</body>
</html>
