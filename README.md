# 地域商店街応援アプリ「ジモマップ」
このWebサイトは、インターンシップで作成したものを、個人で修正・改良したものです。  
ホームページを持たない地域の商店街向けに、ブログの更新が可能なホームページを提供し、より多くのお客様に訪れてもらうことを目的としています。

# 機能一覧
- 商店街の店舗情報の表示
  - 店舗ごとの詳細ページ
  - 住所・営業時間の表示
- ブログ投稿機能
  - 記事の作成・編集・削除（管理者のみ）
- ログイン機能
  - ユーザー登録・ログイン（管理者用）
  - Laravel Breezeを使用
- 管理者機能
  - 管理者ログイン
  - ブログの追加・編集・削除

# 使用技術
- バックエンド: Laravel 10（Webアプリケーションフレームワーク）
- フロントエンド: Bladeテンプレート, JavaScript, HTML, CSS（UI設計）
- データベース: MySQL（データの保存・管理）
- サーバー: Docker, Laravel Sail（ローカル環境構築）
- 開発ツール
  - Docker Desktop（コンテナ管理）
  - phpMyAdmin（データベース管理）
  - npm（フロントエンドのパッケージ管理）

# 環境構成
- ローカル開発環境: Docker, Laravel Sail
- 本番環境: なし（ローカル環境のみ）

# 起動・停止方法について
## 初回セットアップの前提条件
このアプリは Docker + Laravel Sail で動作するため、事前に Docker Desktop をインストールしておく必要があります。

### インストール確認
以下のコマンドを実行し、Dockerが正しくインストールされていることを確認してください：
```sh
docker --version
docker-compose --version
```

## 初回セットアップ手順（上から順番に実行）
```sh
# 作業ディレクトリに移動して作業を進めてください 

cp .env.example .env

#　以下はまとめてコピペして実行してください
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install

# 以下は一つずつ実行してください
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail npm install
npm install -g npm@11.0.0
./vendor/bin/sail npm run dev
```

ここまで実行すると http://localhost/ でアプリにアクセスできます

## エラーが発生した場合
```sh
# 以下のコマンドを実行する際にエラーが起きた場合：
./vendor/bin/sail artisan migrate:fresh --seed

# 以下を行ってください
./vendor/bin/sail down --volumes

# その後、再度以下を実行してください
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail npm install
npm install -g npm@11.0.0
./vendor/bin/sail npm run dev
```

## 2回目以降の起動方法
```sh
./vendor/bin/sail up -d
./vendor/bin/sail npm run dev
```

## 停止する方法
```sh
./vendor/bin/sail stop
```

## URL
Webサイト：http://localhost/

phpMyAdmin: http://localhost:8080/

## コマンドリファレンス
```sh
# MySQLコンソールにログイン
./vendor/bin/sail mysql -u sail -p'password' example_app

# キャッシュ削除
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail artisan config:clear
./vendor/bin/sail artisan route:clear
./vendor/bin/sail artisan view:clear
./vendor/bin/sail artisan clear-compiled

# Laravel実行コンテナにログイン
./vendor/bin/sail shell
```

# 管理者ログイン
このアプリでは、管理者のみがブログの追加・編集・削除を行えます。

## 管理者アカウント
- ユーザー名: editor1
- パスワード: 1234

## ログイン手順
1. トップページの「管理者ログイン」をクリック
2. 上記のユーザー名・パスワードを入力

これにより、ブログの管理画面へ移動し、記事の追加・編集・削除が可能となります。

## 注意
- 現状、ブログ機能は 1つの商店街（A商店街）のみに対応しています。
- ログイン後は「A商店街」のブログ編集画面に移動します。
- 今後、複数の商店街に対応する予定です。
