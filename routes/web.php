<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\customerController;

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

// Home routes
Route::get('/', function(){
    return redirect('/product/all');
});

// Product routes
Route::get('/product/all',[productController::class, 'viewAll'])->name('product.all');
Route::get('/product/add', [productController::class, 'addProductGET'])->name('product.add');
Route::get('/product/{id}', [productController::class, 'viewOne'])->name('product.id');
Route::post('/product/add', [productController::class, 'addProductPOST']);
Route::post('/product/{id}', [productController::class, 'submit']);

// Customer routes
Route::get('/customer/login', [customerController::class, 'loginGet'])->name('customer.login');
Route::get('/customer/dashboard', [customerController::class, 'customerDashboardGet'])->name('customer.dashboard');
Route::get('/customer/cart', [customerController::class, 'customerCartGet'])->name('customer.cart');
Route::get('/customer/productDetail/{pid}', [customerController::class, 'getOneProduct'])->name('customer.viewOneProduct');
Route::get('/customer/logout', [customerController::class, 'customerLogout'])->name('customer.logout');
Route::get('/customer/orders', [customerController::class, 'orderGet'])->name('customer.orders');
Route::post('/customer/login', [customerController::class, 'loginPost']);
Route::post('/customer/productDetail/{pid}', [customerController::class, 'addToCart']);
Route::post('/customer/cart', [customerController::class, 'cartPost']);
