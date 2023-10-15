<?php

use Illuminate\Support\Facades\Route;
use Modules\Home\src\Http\Controllers\Frontend\HomeController;

Route::middleware('web')->group(function (){
    Route::get('/',[HomeController::class,'index'])->name('home.index');

    Route::middleware('admin')->prefix('/admin')->group(function (){
        Route::get('/',[\Modules\Home\src\Http\Controllers\Backend\HomeController::class,'index'])->name('admin.index');
    });
});
