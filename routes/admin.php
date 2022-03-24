<?php
use App\Http\Controllers\Backend\Admin\DasboardController;
use App\Http\Controllers\Backend\Admin\CategoryController;
Route::group([ 'middleware' => 'admin.check'], function() {
    Route::get('dashboard',[DasboardController::class, 'index'])->name('dashboard');
    Route::get('category',[CategoryController::class, 'index'])->name('categories.index');
    Route::get('remove/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('store',[CategoryController::class, 'store'])->name('categories.store');
    Route::get('update/{id}',[CategoryController::class, 'update'])->name('categories.update');
    Route::post('update/{id}',[CategoryController::class, 'UpdateStore']);
});
?>