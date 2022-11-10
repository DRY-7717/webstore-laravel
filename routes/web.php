<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuccessController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.home');
});

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/success', [CartController::class, 'success'])->name('success');
Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/dashboard/product',[DashboardProductController::class,'index'])->name('dashboard-product');
Route::get('/dashboard/product/create',[DashboardProductController::class,'create'])->name('dashboard-product-create');
Route::get('/dashboard/product/{id}',[DashboardProductController::class,'detail'])->name('dashboard-product-detail');

Route::get('/dashboard/transaction',[DashboardTransactionController::class,'index'])->name('dashboard-transaction');
Route::get('/dashboard/transaction/{id}',[DashboardTransactionController::class,'detail'])->name('dashboard-transaction-detail');

Route::get('/dashboard/settings', [DashboardSettingController::class, 'storesetting'])->name('dashboard-storesetting');

Route::get('/dashboard/account', [DashboardSettingController::class, 'accountsetting'])->name('dashboard-accountsetting');