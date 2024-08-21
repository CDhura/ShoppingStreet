<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Route;



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

Route::get('/', function () {
    return view('home');
});



Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/access', [AccessController::class, 'index'])->name('access.index');
Route::get('/hamburger', [MapController::class, 'hamburger'])->name('map.hamburger');
Route::get('/shuttered1', [MapController::class, 'shuttered1'])->name('map.shuttered1');
// Route::middleware('auth')->group(function () {
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
// });

Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.show');
// GETリクエストでフォームを表示するルート
Route::get('/edit/create', [NotificationsController::class, 'create'])->name('notifications.create');
// POSTリクエストでデータを保存するルート
Route::post('/edit', [NotificationsController::class, 'index'])->name('edit.index');

Route::post('/edit/store_for_create', [NotificationsController::class, 'store_for_create'])->name('notifications.store_for_create');
Route::get('/edit/update', [NotificationsController::class, 'update'])->name('notifications.update');
Route::get('/edit/delete/{id}', [NotificationsController::class, 'del'])->name('notifications.delete');
Route::post('/editor/delete/{id}', [NotificationsController::class, 'destroy'])->name('notifications.destroy');


require __DIR__.'/auth.php';

