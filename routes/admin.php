<?php


use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;





Route::post('loginstore', [LoginController::class, 'login_admin'])->name('admin.loginstore');

Route::group(['middleware' => ['Adminlogin']], function () {
    
        Route::prefix('admin')->name('admin.')->group(function () {
            
        Route::get('login', [LoginController::class, 'login'])->name('login');
        
        Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
        Route::get('userlist', [UserController::class, 'usertable'])->name('userlist');
        Route::get('landing', [UserController::class, 'landingpage'])->name('landing');
        
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        
        Route::post('update-page', [UserController::class, 'update'])->name('update-page');
        
    });
    

});



?>