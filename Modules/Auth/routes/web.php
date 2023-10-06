<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function (){
    Route::get('/login',[\Modules\Auth\src\Http\Controllers\Frontend\LoginController::class,'index'])->name('login')->middleware('guest');
    Route::post('/login',[\Modules\Auth\src\Http\Controllers\Frontend\LoginController::class,'login'])->name('login.login')->middleware('guest');
    Route::post('/logout',[\Modules\Auth\src\Http\Controllers\Frontend\LoginController::class,'logout'])->name('logout');

    Route::get('/register',[\Modules\Auth\src\Http\Controllers\Frontend\RegisterController::class,'index'])->name('register')->middleware('guest');
    Route::post('/register',[\Modules\Auth\src\Http\Controllers\Frontend\RegisterController::class,'register'])->name('register.register')->middleware('guest');

    Route::prefix('/admin')->group(function (){
       Route::middleware('admin.guest')->get('/login',[\Modules\Auth\src\Http\Controllers\Backend\LoginController::class,'index'])->name('admin.login');
    });
});


