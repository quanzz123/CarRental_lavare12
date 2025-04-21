<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
// Route::get('/', function () {
//     return view('page_layout');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/shop', [CarController::class, 'index']);
Route::get('/shop/{alias}', [CarController::class, 'Details']);
Route::get('/news',[NewsController::class, 'index']);
Route::get('/news/{id}',[NewsController::class, 'Details']);
Route::get('/admin', [AdminHomeController::class, 'index']);
Route::get('/admin/menu', [AdminMenuController::class, 'index']);
Route::get('/admin/createmenu', [AdminMenuController::class, 'create'])->name('admin.menu.create');
Route::get('/admin/menu/{id}/edit/', [AdminMenuController::class, 'Edit'])->name('admin.menu.edit');
Route::post('/admin/sroremenu', [AdminMenuController::class, 'store'])->name('admin.menu.store');
Route::post('/admin/menu/{id}', [AdminMenuController::class, 'update'])->name('admin.menu.update');
// routes/web.php
Route::post('/add-to-cart', [CartController::class, 'addToCartAjax'])->name('cart.add.ajax');
Route::get('/view-cart', [CartController::class, 'ViewCart'])->name('cart.view');

