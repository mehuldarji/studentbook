<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConnectionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/', LandingController::class);
Route::resource('home', HomeController::class);
Route::get('suggestion-users', [HomeController::class, 'suggestionUsers'])->name('users.suggestion');
Route::post('save-post', [HomeController::class, 'savePost'])->name('post.save');
Route::get('article/{id}', [HomeController::class, 'showArticle'])->name('article.show');

// 
Route::prefix('account')->group(function () {
    Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('save-profile', [ProfileController::class, 'save'])->name('profile.save');
    Route::get('connection', [ConnectionController::class, 'index'])->name('connection.index');
    Route::post('connection-user', [ConnectionController::class, 'getDataConnection'])->name('connection.user');
    Route::post('connection-my-contact', [ConnectionController::class, 'getMyContact'])->name('connection.my-contacts');
    Route::post('connection-connected', [ConnectionController::class, 'connectedRequestSend'])->name('connection.connected');
    Route::post('connection-chnage-status', [ConnectionController::class, 'changeStatus'])->name('connection.changeStatus');
    Route::post('unfollow', [ConnectionController::class, 'unfollow'])->name('connection.unfollow');
});









require __DIR__ . '/auth.php';
