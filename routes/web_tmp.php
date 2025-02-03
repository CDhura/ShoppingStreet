<?php

use App\Http\Controllers\ShoppingStreetController;
// use App\Http\Controllers\HidamariController;
// use App\Http\Controllers\KomorebiController;
// use App\Http\Controllers\HoshiakariController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\EditorsController;
use App\Http\Controllers\editor\AuthenticatedSessionController;
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

// Route::get('/', function () {
//     return view('top');
// });

// トップページ
Route::get('/', [ShoppingStreetController::class, 'index'])->name('index');

// 商店街のルート
Route::prefix('/shopping-street/{name}')->name('shopping-street.')->group(function () {
    Route::get('/', [ShoppingStreetController::class, 'show'])->name('show');
    Route::get('/map', [ShoppingStreetController::class, 'map'])->name('map');
    Route::get('/notifications', [ShoppingStreetController::class, 'notifications'])->name('notifications');
    Route::get('/access', [ShoppingStreetController::class, 'access'])->name('access');
});

// // 陽だまり商店街（架空の商店街）
// Route::prefix('/shopping-street/hidamari')->name('shopping-street.hidamari.')->group(function () {
//     Route::get('/', [HidamariController::class, 'index'])->name('index');
//     Route::get('/map', [HidamariController::class, 'map'])->name('map');
//     Route::get('/notifications', [HidamariController::class, 'notifications'])->name('notifications');
//     Route::get('/access', [HidamariController::class, 'access'])->name('access');
// });

// // 木もれび商店街（架空の商店街）
// Route::prefix('/shopping-street/komorebi')->name('shopping-street.komorebi.')->group(function () {
//     Route::get('/', [KomorebiController::class, 'index'])->name('index');
//     Route::get('/map', [KomorebiController::class, 'map' ])->name('map');
//     Route::get('/notifications', [KomorebiController::class, 'notifications'])->name('notifications');
//     Route::get('/access', [KomorebiController::class, 'access'])->name('access');
// });

// // 星あかり商店街（架空の商店街）
// Route::prefix('/shopping-street/hoshiakari')->name('shopping-street.hoshiakari.')->group(function () {
//     Route::get('/', [HoshiakariController::class, 'index'])->name('index');
//     Route::get('/map', [HoshiakariController::class, 'map'])->name('map');
//     Route::get('/notifications', [HoshiakariController::class, 'notifications'])->name('notifications');
//     Route::get('/access', [HoshiakariController::class, 'access'])->name('access');
// });



Route::get('/home', function () {
    return view('home');
});
Route::get('/home2', function () {
    return view('home2');
});
Route::get('/coming', function () {
    return view('coming');
});


Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/access', [AccessController::class, 'index'])->name('access.index');
Route::get('/hamburger', [MapController::class, 'hamburger'])->name('map.hamburger');
Route::get('/shuttered1', [MapController::class, 'shuttered1'])->name('map.shuttered1');
Route::get('/map/butcher', [Mapcontroller::class, 'butcher'])->name('map.butcher');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');


Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.show');

Route::middleware([Auth_editor::class])->group(function () {
    Route::get('/select', [EditorsController::class, 'select_page'])->name('select');
    Route::get('/edit', [EditorsController::class, 'edit_page'])->name('edit');

    Route::get('/edit/create', [NotificationsController::class, 'create'])->name('notifications.create');
    Route::get('/edit/preview/{id}', [EditorsController::class, 'show'])->name('edit.preview');
    Route::post('/edit/store_for_create', [NotificationsController::class, 'store_for_create'])->name('notifications.store_for_create');
    Route::get('/edit/{id}', [NotificationsController::class, 'update'])->name('notifications.edit');
    Route::post('/edit/update/{id}', [NotificationsController::class, 'update'])->name('notifications.update');
    Route::get('/edit/delete/{id}', [NotificationsController::class, 'delete'])->name('notifications.delete');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


require __DIR__.'/auth.php';

