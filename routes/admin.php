<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\HelpController;
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
        
        
        
        Route::get('cms', [CmsController::class, 'cms'])->name('cms');
        Route::get('cms-add', [CmsController::class, 'cms_add'])->name('cms-add');
        Route::post('cms-store', [CmsController::class, 'cms_store'])->name('cms-store');
        Route::get('cms-edit/{id}', [CmsController::class, 'cms_edit'])->name('cms-edit');
        Route::get('cms-delete/{id}', [CmsController::class, 'cms_delete'])->name('cms-delete');
        Route::post('cms-update/{id}', [CmsController::class, 'cms_update'])->name('cms-update');
         
         
        
        Route::get('help-center', [HelpController::class, 'help_center'])->name('help-center');
        Route::get('help-add', [HelpController::class, 'help_add'])->name('help-add');
        Route::post('help-store', [HelpController::class, 'help_store'])->name('help-store');
        Route::get('help-edit/{id}', [HelpController::class, 'help_edit'])->name('help-edit');
        Route::get('help-delete/{id}', [HelpController::class, 'help_delete'])->name('help-delete');
        Route::post('help-update/{id}', [HelpController::class, 'help_update'])->name('help-update');
        
        
        Route::get('help-faqs/{id}', [HelpController::class, 'help_faqs'])->name('help-faqs');
        Route::get('help-faqs-add/{id}', [HelpController::class, 'helpfaqs_add'])->name('help-faqs-add');
        Route::post('help-faqs-store', [HelpController::class, 'helpfaqs_store'])->name('help-faqs-store');
        Route::get('help-faqs-edit/{id}', [HelpController::class, 'helpfaqs_edit'])->name('help-faqs-edit');
        Route::get('help-faqs-delete/{id}', [HelpController::class, 'helpfaqs_delete'])->name('help-faqs-delete');
        Route::post('help-faqs-update/{id}', [HelpController::class, 'helpfaqs_update'])->name('help-faqs-update');
        
       
    });
});

?>