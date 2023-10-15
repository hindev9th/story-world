<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function (){
   Route::middleware('admin')->prefix('admin')->group(function (){
      Route::get('/tags',[\Modules\Tag\src\Http\Controllers\Backend\TagController::class,'index'])->name('admin.tag.index');
      Route::get('/tags/create',[\Modules\Tag\src\Http\Controllers\Backend\TagController::class,'create'])->name('admin.tag.create');
      Route::post('/tags',[\Modules\Tag\src\Http\Controllers\Backend\TagController::class,'store'])->name('admin.tag.store');
      Route::get('/tags/{tag:name}/edit',[\Modules\Tag\src\Http\Controllers\Backend\TagController::class,'edit'])->name('admin.tag.edit');
      Route::patch('/tags/{tag:name}',[\Modules\Tag\src\Http\Controllers\Backend\TagController::class,'update'])->name('admin.tag.update');
      Route::delete('/tags/{tag:name}',[\Modules\Tag\src\Http\Controllers\Backend\TagController::class,'destroy'])->name('admin.tag.destroy');
   });
});
