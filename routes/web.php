<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersAddressController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\UsersController;
use App\Models\Customer;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::prefix('users')->middleware('auth')->group(function () {

    Route::get('/', [UsersController::class, 'viewListUsers'])->name('user-list');
    Route::get('/create', [UsersController::class, 'viewCreateUser'])->name('view-user-create');
    Route::post('/create', [UsersController::class, 'postCreateUser'])->name('user-create');
    Route::get('/edit/{id}', [UsersController::class, 'editUser'])->name('user-edit');
    Route::post('/edit/{id}', [UsersController::class, 'updateUser'])->name('user-update');
    Route::get('/delete/{id}', [UsersController::class, 'deleteUser'])->name('user-delete');
});

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', [CustomersController::class, 'viewListCustomers'])->name('customer-list');

    Route::get('/create', [CustomersController::class, 'viewCreateCustomers'])->name('view-customer-create');
    Route::post('/create', [CustomersController::class, 'postCreateCustomer'])->name('customer-create');

    Route::get('/profile/{id}', [CustomersController::class, 'viewProfile'])->name('view-profile');
    Route::post('/profile/{id}', [CustomersController::class, 'editProfile'])->name('edit-profile');

    Route::get('/delete/{id}', [CustomersController::class, 'deleteProfile'])->name('customer-delete');

    Route::post('/address', [CustomersAddressController::class, 'postCreateAddress'])->name('create-address');

    Route::get('/address/delete/{id}', [CustomersAddressController::class, 'deleteAddress'])->name('delete-address');

    Route::get('/profile/{id}/pets/create', [AnimalsController::class, 'viewCreatePets'])->name('view-pet-create');
    Route::post('/profile/pets/create', [AnimalsController::class, 'postCreatePet'])->name('pet-create');

    Route::get('/profile/pets/edit/{id}', [AnimalsController::class, 'editPet'])->name('edit-pet');
    Route::post('/profile/pets/edit/{id}', [AnimalsController::class, 'updatePet'])->name('update-pet');
});

Route::get('/address/edit/{id}', [CustomersAddressController::class, 'searchAddress']);
Route::get('/breeds/{id}', [AnimalsController::class, 'searchBreeds']);

Route::get('/cadastros/agendamento', function(){
    return view('/cadastros/agendamento');
});

Route::get('/cadastros/veterinario', function(){
    return view('/cadastros/veterinario');
});

Route::get('/cadastros/servico', function(){
    return view('/cadastros/servico');
});

