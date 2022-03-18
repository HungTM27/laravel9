<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\DasboardController;
use App\Http\Controllers\Backend\Admin\CategoryController;
Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard',[DasboardController::class, 'index'])->name('dashboard');
    Route::get('category',[CategoryController::class, 'index']);
});
?>
