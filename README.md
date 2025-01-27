# 地域商店街応援アプリ「ジモマップ」

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
./vender/bin/sail up -d
./vendor/bin/sail npm run dev
```

## 停止する方法

```sh
docker-compose stop
```

## URL
サンプルアプリ：http://localhost/

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
