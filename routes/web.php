<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminMenuController;
// Route::get('/', function () {
//     return view('page_layout');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/shop', [CarController::class, 'index']);
Route::get('/shop/{alias}', [CarController::class, 'Details']);
Route::get('/admin', [AdminHomeController::class, 'index']);
Route::get('/admin/menu', [AdminMenuController::class, 'index']);
Route::get('/admin/createmenu', [AdminMenuController::class, 'create']);
Route::post('/admin/sroremenu', [AdminMenuController::class, 'store'])->name('admin.menu.store');

