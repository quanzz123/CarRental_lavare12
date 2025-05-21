<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrdersController;
// Route::get('/', function () {
//     return view('page_layout');
// });
//page
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/shop', [CarController::class, 'index']);
Route::get('/shop/{alias}', [CarController::class, 'Details']);
Route::get('/news',[NewsController::class, 'index']);
Route::get('/news/{id}',[NewsController::class, 'Details']);
//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

// Menu Routes
Route::get('/admin/menu', [AdminMenuController::class, 'index'])->name('admin.menu.index');
Route::get('/admin/createmenu', [AdminMenuController::class, 'create'])->name('admin.menu.create');
Route::get('/admin/menu/{id}/edit/', [AdminMenuController::class, 'Edit'])->name('admin.menu.edit');
Route::post('/admin/sroremenu', [AdminMenuController::class, 'store'])->name('admin.menu.store');
Route::post('/admin/menu/{id}', [AdminMenuController::class, 'update'])->name('admin.menu.update');
Route::delete('/admin/menu/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menu.destroy');

// Slider Routes
Route::prefix('admin')->name('admin.')->group(function () {
    //sliderr
    Route::get('/slider', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('/slider', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('/slider/{id}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');

    //Order
    Route::get('/order', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/order/{id}', [OrdersController::class, 'show'])->name('orders.show');
    Route::get('/order/{id}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
    Route::put('/order/{id}', [OrdersController::class, 'update'])->name('orders.update');
});


Route::post('/add-to-cart', [CartController::class, 'addToCartAjax'])->name('cart.add.ajax');
Route::get('/view-cart', [CartController::class, 'ViewCart'])->name('cart.view');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
//vn payment - protected by auth middleware
Route::middleware(['auth'])->group(function () {
    Route::post('/vnpay-payment', [CheckoutController::class, 'vnpay_payment'])->name('vnpay.payment');
    Route::get('/vnpay-return', [CheckoutController::class, 'vnpay_return'])->name('vnpay.return');
    Route::get('/thank-you', [CheckoutController::class, 'thankYou'])->name('thank.you');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
});

//Auth
Route::get('/login', [AccountsController::class, 'showLogin'])->name('login');
Route::get('/register', [AccountsController::class, 'showRegister'])->name('register');
Route::post('/register', [AccountsController::class, 'register'])->name('register');
Route::post('/login', [AccountsController::class, 'login'])->name('login');
Route::get('/logout', [AccountsController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});