<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('fake-user', function () {
        $user = new App\Models\User;
        $user->name = 'Tran Manh Hung';
        $user->email = 'hungtm199@topcv.vn';
        $user->password = bcrypt(123456789);
        $user->role = 2;
        $user->save();
});
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('Logout', [LoginController::class, 'logout'])->name('logout');
Route::get('login', [LoginController::class, 'index'])->name('login.index');
