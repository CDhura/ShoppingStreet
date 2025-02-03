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
    Route::prefix('/access')->name('access.')->group(function() {
        Route::get('/', [ShoppingStreetController::class, 'access'])->name('index');
    });
});

Route::get('/coming', function () {
    return view('coming');
})->name('coming');




require __DIR__.'/auth.php';

