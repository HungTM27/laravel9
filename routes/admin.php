<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\DasboardController;


Route::get('dashboard',[DasboardController::class, 'index']);
?>
