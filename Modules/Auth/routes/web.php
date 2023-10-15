<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\src\Http\Controllers\Frontend\LoginController;
use Modules\Auth\src\Http\Controllers\Frontend\RegisterController;

Route::middleware('web')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->name('login.login')->middleware('guest');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.register')->middleware('guest');

    Route::prefix('/admin')->group(function () {
        Route::middleware('admin.guest')
            ->get('/login', [\Modules\Auth\src\Http\Controllers\Backend\LoginController::class, 'index'])
            ->name('admin.login');
        Route::middleware('admin.guest')
            ->post('/login', [\Modules\Auth\src\Http\Controllers\Backend\LoginController::class, 'login'])
            ->name('admin.login.login');

        Route::middleware('admin.guest')
            ->get('/logout', function () {
                return view('Auth::adminhtml.sign-out');
            })->name('admin.logout');

        Route::middleware('admin')
            ->post('/logout', [\Modules\Auth\src\Http\Controllers\Backend\LoginController::class, 'logout'])
            ->name('admin.logout.logout');
    });
});


