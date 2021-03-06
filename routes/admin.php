<?php
use App\Http\Controllers\Backend\Admin\DasboardController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\ProductController;
Route::group([ 'middleware' => 'admin.check'], function() {
    Route::get('dashboard',[DasboardController::class, 'index'])->name('dashboard');
    Route::get('category',[CategoryController::class, 'index'])->name('categories.index');
     Route::post('categories-update',[CategoryController::class, 'update'])->name('categories.update');
    Route::get('remove/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('store',[CategoryController::class, 'store'])->name('categories.store');
    Route::post('update/{id}',[CategoryController::class, 'UpdateStore']);
    Route::get('product',[ProductController::class, 'index'])->name('products.index');
    Route::post('products-add',[ProductController::class, 'store'])->name('products.store');
    Route::get('products-remove/{id}',[ProductController::class, 'destroy'])->name('products.remove');
    Route::post('products-update',[ProductController::class, 'update'])->name('products.update');
});
?>