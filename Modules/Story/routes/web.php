<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function (){
   Route::middleware('admin')->prefix('admin')->group(function (){
       Route::get('/stories',[\Modules\Story\src\Http\Controllers\Backend\StoryController::class,'index'])->name('admin.story.index');
       Route::get('/story/create',[\Modules\Story\src\Http\Controllers\Backend\StoryController::class,'create'])->name('admin.story.create');
       Route::post('/story',[\Modules\Story\src\Http\Controllers\Backend\StoryController::class,'store'])->name('admin.story.store');
       Route::get('/story/{story}/edit',[\Modules\Story\src\Http\Controllers\Backend\StoryController::class,'edit'])->name('admin.story.edit');
       Route::patch('/story/{story}',[\Modules\Story\src\Http\Controllers\Backend\StoryController::class,'update'])->name('admin.story.update');
       Route::delete('/story/{story}',[\Modules\Story\src\Http\Controllers\Backend\StoryController::class,'destroy'])->name('admin.story.destroy');
   });
});
