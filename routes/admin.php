<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\DasboardController;

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard',[DasboardController::class, 'index'])->name('dashboard');
});
?>
