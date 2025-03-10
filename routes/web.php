<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home'); 
});

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');

    Route::view('register', 'auth.register')->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');

    Route::view('forgot', 'auth.forgot')->name('forgot');
    Route::post('forgot/store' , [AuthController::class, 'forgot'])->name('forgot.store');
    Route::get('reset/{token}', [AuthController::class, 'resetPassword']);
    Route::post('reset/store/{token}', [AuthController::class, 'resetPasswordStore'])->name('reset.password.store');   
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::resource('blog', BlogController::class);

    Route::controller(CheckoutController::class)->group(function () {
       Route::get('checkout/{id}/{cycle}', 'checkout')->name('checkout');
       Route::get('checkout/success', 'success')->name('checkout.success');
       Route::get('checkout/cancel', 'cancel')->name('checkout.cancel');
       Route::get('subscription/upgrade', 'upgrade')->name('upgrade.pricing');
       Route::post('subscription/upgrade/{id}/{cycle}','upgradeSubscription')->name('subscription.upgrade');
    });

    Route::controller(SubscriptionController::class)->group(function () {
       Route::get('subscribed', 'index')->name('subscribed.user'); 
    //    Route::post('/upgrade/{id}/{cycle}', 'upgrade')->name('subscription.upgrade');
       Route::delete('subscription/{id}', 'destroy')->name('subscription.destroy');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
