<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
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
    Route::post('/forgot/store' , [AuthController::class, 'forgot'])->name('forgot.store');
    Route::get('/reset/{token}', [AuthController::class, 'resetPassword']);
    Route::post('/reset/store/{token}', [AuthController::class, 'resetPasswordStore'])->name('reset.password.store');   
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::controller(BlogController::class)->group(function () {
       Route::get('blog/all', 'show')->name('blog.show');
       Route::get('blog', 'create')->name('blog.create'); 
       Route::post('blog', 'store')->name('blog.store');
       Route::get('blog/edit/{id}', 'edit')->name('blog.edit');
       Route::put('blog/{id}',  'update')->name('blog.update');
       Route::delete('blog/{id}', 'destroy')->name('blog.destroy');
    });

    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('/subscriptions', 'index')->name('subscriptions.index');
        Route::post('/subscribe', 'subscribe')->name('subscribe');
        Route::get('/subscriptions/success', 'success')->name('subscriptions.success');
        Route::get('/subscriptions/cancel', 'cancel')->name('subscriptions.cancel');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});