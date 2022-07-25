<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Output;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;

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
    return redirect('/trangchu');
});

//Web sale

Route::get('/trangchu', [PageController::class, 'getIndex']);
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);
Route::get('/detail/{id}', [PageController::class, 'getDetail']);
Route::get('/contact', [PageController::class, 'getContact']);
Route::get('/about', [PageController::class, 'getAbout']);
// ----------------- CART ---------------
Route::get('add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');
Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');
// ----------------- CHECKOUT ---------------
Route::get('check-out', [PageController::class, 'getCheckout'])->name('dathang');
Route::post('check-out', [PageController::class, 'postCheckout'])->name('dathang');

Route::get('/admin', [PageController::class, 'getIndexAdmin']);
Route::get('/admin-add-form', [PageController::class, 'getAdminAdd'])->name('add-product');
Route::post('/admin-add-form', [PageController::class, 'postAdminAdd']);
Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit']);
Route::post('/admin-edit', [PageController::class, 'postAdminEdit']);
Route::post('/admin-delete/{id}', [PageController::class, 'postAdminDelete']);

Route::get('/admin-export', [PageController::class, 'exportAdminProduct'])->name('export');

Route::get('/return-vnpay', function () {
    return view('vnpay.return-vnpay');
});


//------------------------- Wishlist ---------------------------------//
Route::prefix('wishlist')->group(function () {
    Route::get('/add/{id}', [WishlistController::class, 'AddWishlist']);
    Route::get('/delete/{id}', [WishlistController::class, 'DeleteWishlist']);

    Route::get('/order', [WishlistController::class, 'OrderWishlist']);
});

//------------------------- Comment ---------------------------------//
Route::post('/comment/{id}', [CommentController::class, 'AddComment']);


//------------------------- Login, Logout, Register ---------------------------------//
Route::get('/login', function () {
    return view('users.login');
});

Route::post('/login', [UserController::class, 'Login']);

Route::get('/logout', [UserController::class, 'Logout']);

Route::get('/register', function () {
    return view('users.register');
});

Route::post('/register', [UserController::class, 'Register']);
