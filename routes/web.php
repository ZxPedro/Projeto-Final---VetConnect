<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersAddressController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoryUserController;
use App\Http\Controllers\FinancialReleasesController;
use App\Http\Controllers\ProductsController;
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

Route::prefix('agendamento')->middleware('auth')->group(function () {
    Route::get('/', [SchedulingController::class, 'viewListScheduling'])->name('agendamentos-list');
    Route::get('/service/{id}', [SchedulingController::class, 'viewServiceById'])->name('agendamento-view');
    Route::post('/service/edit/{id}', [SchedulingController::class, 'updateServiceById'])->name('agendamento-update');
    Route::get('/create', [SchedulingController::class, 'viewCreateScheduling'])->name('agendamentos');
    Route::post('/create', [SchedulingController::class, 'postCreateScheduling'])->name('agendamentos-create');
    Route::post('/finish/{id}', [SchedulingController::class, 'finishService'])->name('finalizar-agendamento');
    Route::post('/cancel/{id}', [SchedulingController::class, 'cancelService'])->name('cancelar-agendamento');
});

Route::prefix('produto')->middleware('auth')->group(function () {
    Route::get('/', [ProductsController::class, 'viewListProducts'])->name('products-list');
    Route::get('/create', [ProductsController::class, 'viewCreateProduct'])->name('view-product-create');
    Route::post('/create', [ProductsController::class, 'postCreateProduct'])->name('product-create');
    Route::get('/edit/{id}', [ProductsController::class, 'editProduct'])->name('product-edit');
    Route::post('/edit/{id}', [ProductsController::class, 'updateProduct'])->name('product-update');
    Route::get('/delete/{id}', [ProductsController::class, 'deleteProduct'])->name('product-delete');

    Route::post('/update', [ProductsController::class, 'updateStock'])->name('product-stock');
});


Route::prefix('financeiro')->middleware('auth')->group(function () {
    Route::get('/', [FinancialReleasesController::class, 'viewReleases'])->name('finance-list');
    Route::post('/create', [FinancialReleasesController::class, 'postReleases'])->name('post-finance');
    Route::get('/delete/{id}', [FinancialReleasesController::class, 'deleteReleases'])->name('release-delete');
});

Route::prefix('relatorios')->middleware('auth')->group(function () {
    Route::get('/estoque/ruptura', [ProductsController::class, 'stockOutReport'])->name('stock_out-report');
    Route::get('/estoque/negativo', [ProductsController::class, 'negativeStockReport'])->name('negative_stock-report');
    Route::get('/atendimentos', [SchedulingController::class, 'serviceReport'])->name('service-report');
});

Route::get('/breeds/{id}', [AnimalsController::class, 'searchBreeds'])->middleware('auth');
Route::get('/animalscustomer/{id}', [CustomersController::class, 'searchAnimalsCustomer'])->middleware('auth');
Route::get('/professionalcategories/{id}', [UsersController::class, 'userCategories'])->middleware('auth');
Route::get('/categoryservice/{id}', [CategoriesController::class, 'searchServicesCategory'])->middleware('auth');
Route::get('/getpriceservice/{id}', [ServicesController::class, 'getPriceService'])->middleware('auth');
Route::get('/getrelease/{id}', [FinancialReleasesController::class, 'getRelease'])->middleware('auth');

//Filtros
Route::get('/searchcustomers',  [CustomersController::class, 'searchCustomers'])->name('search-customers');
Route::get('/searchusers',  [UsersController::class, 'searchUsers'])->name('search-users');
Route::get('/searchcategories',  [CategoriesController::class, 'searchCategories'])->name('search-categories');
Route::get('/searchservices',  [ServicesController::class, 'searchServices'])->name('search-services');
Route::get('/searchprofessionals',  [CategoryUserController::class, 'searchProfessionals'])->name('search-professionals');
Route::get('/searchproducts', [ProductsController::class, 'searchProducts'])->name('search-products');
Route::get('/searchscheduling', [SchedulingController::class, 'searchScheduling'])->name('search-scheduling');
