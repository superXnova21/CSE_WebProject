<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SslCommerzPaymentController;



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

// Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    // // SSLCOMMERZ Start
    // Route::get('/user-profile', [SslCommerzPaymentController::class, 'userprofile'])->name('user.profile');
    // Route::get('/user-profile-data', [SslCommerzPaymentController::class, 'userprofiledata'])->name('userprofile.data');

    Route::get('/user-profile', [SslCommerzPaymentController::class, 'userprofiledata'])->name('user.profile');
    Route::get('/user-profile-data', [SslCommerzPaymentController::class, 'userprofiledata'])->name('userprofile.data');



    Route::post('/profile/update', [SslCommerzPaymentController::class, 'updateUserProfile'])->name('profile.update');



    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('home.user');
    Route::get('/example2/{id}', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('checkout');

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

});

// Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::controller(HomePageController::class)->group(function () {
        Route::get('/admin', 'admin')->name('home.admin');
        // Previous Events
        Route::get('/admin/prev-events', 'prevEvents')->name('prevevents.create');
        Route::post('/admin/prev-events/store', 'storeEvents')->name('prevevents.store');
        Route::get('/admin/prev-events/edit/{id}', 'editEvents')->name('prevevents.update');
        Route::post('/admin/prev-events/update/{id}', 'updateEvents')->name('prevevents.update');
        Route::delete('/admin/prev-events/{id}','destroy')->name('prev-events.destroy');
        // Services
        Route::get('/admin/services', 'services')->name('service.create');
        Route::post('/admin/services/store', 'storeService')->name('service.store');
        Route::get('/admin/services/edit/{id}', 'editService')->name('service.update');
        Route::post('/admin/services/update/{id}', 'updateService')->name('service.update');
        Route::delete('/admin/services/{id}','destroyService')->name('service.destroy');
        // About us
        Route::get('/admin/about-us', 'aboutUs')->name('about.create');
        Route::post('/admin/about-us/store', 'storeAbout')->name('about.store');
        Route::get('/admin/about-us/edit/{id}', 'editAbout')->name('about.update');
        Route::post('/admin/about-us/update/{id}', 'updateAbout')->name('about.update');
        Route::delete('/admin/about-us/{id}','destroyAbout')->name('about.destroy');
        // Pricing
        Route::get('/admin/pricing', 'pricing')->name('pricing.create');
        Route::post('/admin/pricing/store', 'storePricing')->name('pricing.store');
        Route::get('/admin/pricing/edit/{id}', 'editPricing')->name('pricing.update');
        Route::post('/admin/pricing/update/{id}', 'updatePricing')->name('pricing.update');
        Route::delete('/admin/pricing/{id}','destroyPricing')->name('pricing.destroy');
        // Delete message
        Route::delete('/admin/message/{id}','destroyMessage')->name('message.destroy');

    });
});
