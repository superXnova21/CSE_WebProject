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