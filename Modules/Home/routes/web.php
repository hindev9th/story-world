<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function (){
    Route::get('/',[\Modules\Home\src\Http\Controllers\Frontend\HomeController::class,'index'])->name('home.index');

    Route::middleware('admin')->prefix('/admin')->group(function (){
        Route::get('/',[\Modules\Home\src\Http\Controllers\Backend\HomeController::class,'index'])->name('admin.index');
    });
});
