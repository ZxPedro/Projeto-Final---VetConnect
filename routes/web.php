<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'viewLoginPage']);
Route::post('/', [AuthController::class, 'postAuthenticate'])->name('login');
ROute::get('/logout', [AuthController::class, 'getLogout'])->name('logout');

Route::get('/users', [UsersController::class, 'viewListUsers'])->middleware('auth')->name('user-list');
Route::get('/users/delete/{id}', [UsersController::class, 'deleteUser'])->middleware('auth')->name('user-delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
