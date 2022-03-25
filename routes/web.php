<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\LoginController;
use App\Http\Controllers\FontEnd\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('fake-user', function () {
        $user = new App\Models\User;
        $user->name = 'hung';
        $user->email = 'hung199@topcv.vn';
        $user->password = bcrypt(123456789);
        $user->role = 2;
        $user->save();
});
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('Logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('Logout', [LoginController::class, 'logout'])->name('logout');
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::get('/', [HomeController::class, 'index'])->name('welcome');