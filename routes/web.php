<?php

use App\Http\Controllers\ShoppingStreetController;
use App\Http\Controllers\EditorController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\EditorsController;
// use App\Http\Controllers\editor\AuthenticatedSessionController;
use App\Http\Middleware\Auth_editor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// トップページ
Route::get('/', [ShoppingStreetController::class, 'index'])->name('index');

// 商店街のルート
Route::prefix('/shopping-street/{name}')->name('shopping-street.')->group(function () {
    Route::get('/', [ShoppingStreetController::class, 'show'])->name('show');
    Route::prefix('/map')->name('map.')->group(function () {
        Route::get('/', [ShoppingStreetController::class, 'map'])->name('index');
        Route::get('/butcher', [ShoppingStreetController::class, 'mapButcher'])->name('butcher');
        Route::get('/hamburger', [ShoppingStreetController::class, 'mapHamburger'])->name('hamburger');
        Route::get('/shuttered', [ShoppingStreetController::class, 'mapShuttered'])->name('shuttered');
        Route::get('/flower', [ShoppingStreetController::class, 'mapFlower'])->name('flower');
        Route::get('/fish', [ShoppingStreetController::class, 'mapFish'])->name('fish');
        Route::get('/yaoya', [ShoppingStreetController::class, 'mapYaoya'])->name('yaoya');
    });
    Route::prefix('/notifications')->name('notifications.')->group(function () {
        Route::get('/', [ShoppingStreetController::class, 'notifications'])->name('index');
        Route::get('/{id}', [ShoppingStreetController::class, 'notificationsShow'])->name('show');
    });
    Route::prefix('/notices')->name('notices.')->group(function () {
        Route::get('/', [ShoppingStreetController::class, 'notices'])->name('index');
        Route::get('/{id}', [ShoppingStreetController::class, 'noticesShow'])->name('show');
    });
    Route::prefix('/access')->name('access.')->group(function() {
        Route::get('/', [ShoppingStreetController::class, 'access'])->name('index');
    });
});

// 準備中ページ
Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');


// web.phpの役割：（auth.phpとの違い）
// ・ログインが必要なページ (/select など) を定義する
// ・未ログインユーザーを /login にリダイレクトする処理 を定義する
// ・認証処理 (/login, /logout) は 書かない（auth.php に移動する）

// ログイン済みユーザー用ページ    
Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [ShoppingStreetController::class, 'mypage'])->name('mypage');
    Route::post('/logout', [ShoppingStreetController::class, 'logout'])->name('logout');

    // お知らせの CRUD 操作
    Route::get('/notices/{notice}/admin-show', [ShoppingStreetController::class, 'adminShowNotice'])->name('notices.admin-show'); // {notice}にはNoticeテーブルのレコードを渡してもよい. （自動でIdに変換される. ）
    Route::get('/notices/create', [ShoppingStreetController::class, 'createNotice'])->name('notices.create');
    Route::post('/notices', [ShoppingStreetController::class, 'storeNotice'])->name('notices.store');
    Route::get('/notices/{notice}/edit', [ShoppingStreetController::class, 'editNotice'])->name('notices.edit');
    Route::put('/notices/{notice}', [ShoppingStreetController::class, 'updateNotice'])->name('notices.update');
    Route::delete('/notices/{notice}', [ShoppingStreetController::class, 'deleteNotice'])->name('notices.delete');
});

// ログアウト時にリダイレクトされるページ
Route::get('/goodbye', [ShoppingStreetController::class, 'goodbye'])->name('goodbye');


require __DIR__.'/auth.php';

