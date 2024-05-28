<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;



Route::controller(HomePageController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/admin', 'admin')->name('home.admin');
    // Message
    Route::post('/message/store','storeMessage')->name('message.store');
});

Route::controller(AuthController::class)->group(function () {
    // Register Page
    Route::get('/register-page', [AuthController::class, 'registerPage'])->name('auth.register-page');
    // Save Registered User
    Route::post('/user-save', [AuthController::class, 'storeUser'])->name('auth.save-user');
    // Login Page
    Route::get('/login-page', [AuthController::class, 'loginPage'])->name('login');
    // Login Action
    Route::post('/loginsystem/login', [AuthController::class, 'loginAction'])->name('auth.login-action');
    // Logout Action
    Route::get('/logout', 'logout')->middleware('auth')->name('auth.logout-action');
});



