<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersAddressController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoryUserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SchedulingController;
use App\Models\Customer;
use App\Models\Scheduling;
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

Route::get('/dashboard', [SchedulingController::class, 'viewSchedulesDashboard'])->middleware('auth')->name('dashboard');

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
    Route::get('/profile/pets//delete/{id}', [AnimalsController::class, 'deletePet'])->name('delete-pet');
});


Route::prefix('cadastros/categories')->middleware('auth')->group(function () {
    Route::get('/', [CategoriesController::class, 'viewListCategories'])->name('categories-list');
    Route::get('/create', [CategoriesController::class, 'viewCreateCategories'])->name('view-categories-create');
    Route::post('/create', [CategoriesController::class, 'postCreateCategories'])->name('categories-create');

    Route::get('/edit/{id}', [CategoriesController::class, 'editCategory'])->name('categories-edit');
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory'])->name('categories-update');

    Route::get('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('category-delete');
});


Route::prefix('cadastros/services')->middleware('auth')->group(function () {
    Route::get('/', [ServicesController::class, 'viewListServices'])->name('services-list');
    Route::get('/create', [ServicesController::class, 'viewCreateServices'])->name('view-services-create');
    Route::post('/create', [ServicesController::class, 'postCreateServices'])->name('services-create');

    Route::get('/edit/{id}', [ServicesController::class, 'editService'])->name('services-edit');
    Route::post('/edit/{id}', [ServicesController::class, 'updateService'])->name('service-update');

    Route::get('/delete/{id}', [ServicesController::class, 'deleteService'])->name('service-delete');
});


Route::prefix('cadastros/professionals')->middleware('auth')->group(function () {
    Route::get('/', [CategoryUserController::class, 'viewListProfessionals'])->name('professionals-list');
    Route::get('/create', [CategoryUserController::class, 'viewCreateProfessionals'])->name('view-professionals-create');
    Route::post('/create', [CategoryUserController::class, 'postCreateProfessionals'])->name('professionals-create');

    Route::get('/edit/{id}', [CategoryUserController::class, 'editProfessional'])->name('professionals-edit');
    Route::post('/edit/{id}', [CategoryUserController::class, 'updateProfessional'])->name('professional-update');

    Route::get('/delete/{id}', [CategoryUserController::class, 'deleteProfessional'])->name('professional-delete');
});

Route::get('/address/edit/{id}', [CustomersAddressController::class, 'searchAddress']);

Route::get('/breeds/{id}', [AnimalsController::class, 'searchBreeds'])->middleware('auth');
Route::get('/animalscustomer/{id}', [CustomersController::class, 'searchAnimalsCustomer'])->middleware('auth');
Route::get('/professionalcategories/{id}', [UsersController::class, 'userCategories'])->middleware('auth');
Route::get('/categoryservice/{id}', [CategoriesController::class, 'searchServicesCategory'])->middleware('auth');
Route::get('/getpriceservice/{id}', [ServicesController::class, 'getPriceService'])->middleware('auth');

Route::prefix('agendamento')->middleware('auth')->group(function () {
    Route::get('/', [SchedulingController::class, 'viewListScheduling'])->name('agendamentos-list');
    Route::get('/service/{id}', [SchedulingController::class, 'viewServiceById'])->name('agendamento-view');
    Route::get('/create', [SchedulingController::class, 'viewCreateScheduling'])->name('agendamentos');
    Route::post('/create', [SchedulingController::class, 'postCreateScheduling'])->name('agendamentos-create');
    Route::post('/finish/{id}', [SchedulingController::class, 'finishService'])->name('finalizar-agendamento');
});

Route::get('/cadastros/veterinario', function () {
    return view('cadastros.professionals.professionals_create');
});
