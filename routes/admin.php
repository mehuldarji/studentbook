<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::post('loginstore', [LoginController::class, 'login_admin'])->name('admin.loginstore');

Route::group(['middleware' => ['Adminlogin']], function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('login', [LoginController::class, 'login'])->name('login');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
        Route::get('userlist', [UserController::class, 'usertable'])->name('userlist');
        
        Route::get('landing', [UserController::class, 'landingpage'])->name('landing');
        Route::post('update-page', [UserController::class, 'update'])->name('update-page');
        
        Route::get('title', [PostController::class, 'titlepage'])->name('title');
        Route::get('description', [PostController::class, 'description'])->name('description');
        Route::get('youtube-url', [PostController::class, 'youtube_url'])->name('youtube-url');
    });
});

?>