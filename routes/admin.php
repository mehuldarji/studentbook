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
        
        Route::get('post', [PostController::class, 'post'])->name('post');
        Route::get('post-form', [PostController::class, 'post_form'])->name('post-form');
        Route::post('post-store', [PostController::class, 'post_store'])->name('post-store');
        Route::get('post-edit/{id}', [PostController::class, 'post_edit'])->name('post-edit');
        Route::get('post-delete/{id}', [PostController::class, 'post_delete'])->name('post-delete');
        Route::post('post-update/{id}', [PostController::class, 'post_update'])->name('post-update');
       
    });
});

?>