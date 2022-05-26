<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

//Main Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin Routes Group
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function(){
    Route::get('/home', [AdminController::class, 'home'])->name('home');
    Route::get('/create-customer', [AdminController::class, 'createCustomer'])->name('create.customer');
    Route::get('/get-customers', [AdminController::class, 'getCustomers'])->name('get.customers');
    Route::post('/store-customer', [AdminController::class, 'storeCustomer'])->name('store.customer');
    Route::delete('/delete-customer', [AdminController::class, 'deleteCustomer'])->name('delete.customer');
});

//Customer Routes Group
Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => 'role:customer'], function(){
    Route::get('/home', [CustomerController::class, 'home'])->name('home');
});
