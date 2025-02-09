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
    Route::get('/notices/create', [ShoppingStreetController::class, 'createNotice'])->name('notices.create');
    Route::post('/notices', [ShoppingStreetController::class, 'storeNotice'])->name('notices.store');
    Route::get('/notices/{notice}/edit', [ShoppingStreetController::class, 'editNotice'])->name('notices.edit');
    Route::put('/notices/{notice}', [ShoppingStreetController::class, 'updateNotice'])->name('notices.update');
    Route::delete('/notices/{notice}', [ShoppingStreetController::class, 'deleteNotice'])->name('notices.delete');
});

// ログアウト時にリダイレクトされるページ
Route::get('/goodbye', [ShoppingStreetController::class, 'goodbye'])->name('goodbye');

// 使用していない
Route::middleware(['auth'])->group(function () {
    // Route::get('/select', function () {
    //     return 'ログイン成功！ここは /select です';
    // })->name('select');
    // Route::get('/mypage', [EditorController::class, 'mypage'])->name('mypage');

    Route::get('/select', [EditorsController::class, 'select_page'])->name('select');
    Route::get('/edit', [EditorsController::class, 'edit_page'])->name('edit');

    Route::get('/edit/create', [NotificationsController::class, 'create'])->name('notifications.create');
    Route::get('/edit/preview/{id}', [EditorsController::class, 'show'])->name('edit.preview');
    Route::post('/edit/store_for_create', [NotificationsController::class, 'store_for_create'])->name('notifications.store_for_create');
    Route::get('/edit/{id}', [NotificationsController::class, 'update'])->name('notifications.edit');
    Route::post('/edit/update/{id}', [NotificationsController::class, 'update'])->name('notifications.update');
    Route::get('/edit/delete/{id}', [NotificationsController::class, 'delete'])->name('notifications.delete');
    // Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Route::middleware([Auth_editor::class])->group(function () {
//     Route::get('/select', [EditorsController::class, 'select_page'])->name('select');
//     Route::get('/edit', [EditorsController::class, 'edit_page'])->name('edit');

//     Route::get('/edit/create', [NotificationsController::class, 'create'])->name('notifications.create');
//     Route::get('/edit/preview/{id}', [EditorsController::class, 'show'])->name('edit.preview');
//     Route::post('/edit/store_for_create', [NotificationsController::class, 'store_for_create'])->name('notifications.store_for_create');
//     Route::get('/edit/{id}', [NotificationsController::class, 'update'])->name('notifications.edit');
//     Route::post('/edit/update/{id}', [NotificationsController::class, 'update'])->name('notifications.update');
//     Route::get('/edit/delete/{id}', [NotificationsController::class, 'delete'])->name('notifications.delete');
//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// });

require __DIR__.'/auth.php';

