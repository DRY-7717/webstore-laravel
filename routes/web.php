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
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DashboardGalleryproductController;
use App\Http\Controllers\Admin\DashboardProductController as AdminDashboardProductController;
use App\Http\Controllers\Admin\DashboardProductGalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/detail/{product:slug}', [DetailController::class, 'index'])->name('detail');
Route::post('/detail/{id}', [DetailController::class, 'add'])->name('detail-add');



Route::get('/success', [CartController::class, 'success'])->name('success');
Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');







// Controller Middleware Auth
Route::middleware(['auth'])->group(function () {
    // cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/card/{id}', [CartController::class, 'destroy'])->name('delete-cart');
    // Controller checkout
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/dashboard/product', DashboardProductController::class);
    Route::post('/dashboard/product/galleryproduct/upload', [DashboardProductController::class, 'galleryupload'])->name('dashboard-product-gallery-upload');
    
    Route::get('/dashboard/product/galleryproduct/delete/{id}', [DashboardProductController::class, 'gallerydelete'])->name('dashboard-product-gallery-delete');


    Route::get('/dashboard/transaction', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
    Route::get('/dashboard/transaction/{id}', [DashboardTransactionController::class, 'detail'])->name('dashboard-transaction-detail');
    Route::post('/dashboard/transaction/{id}', [DashboardTransactionController::class, 'update'])->name('dashboard-transaction-update');

    Route::get('/dashboard/settings', [DashboardSettingController::class, 'storesetting'])->name('dashboard-storesetting');

    Route::get('/dashboard/account', [DashboardSettingController::class, 'accountsetting'])->name('dashboard-accountsetting');

    Route::post('/dashboard/account/{redirect}', [DashboardSettingController::class, 'accountupdate'])->name('dashboard-account-redirect');

});

// Controller Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/product', AdminDashboardProductController::class);
    Route::resource('/galleryproduct', DashboardGalleryproductController::class);
});


// Checkout Controller
Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');
