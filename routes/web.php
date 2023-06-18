<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortoController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LogoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('/', PortoController::class);
Route::get('/', [PortoController::class, 'index'])->name('porto');

Route::get('/login', [LoginController::class, 'index'])->name('login.page');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LogoutController::class, 'index'])->name('logout');


Route::middleware('jwt.web')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/getme', [DashboardController::class, 'getme'])->name('getme');

    // portofolio
    Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio');
    Route::post('/portofolio', [PortofolioController::class, 'create'])->name('portofolio.create');
    Route::post('/portofolio/{id}', [PortofolioController::class, 'edit'])->name('portofolio.edit');
    Route::get('/portofolio/{id}', [PortofolioController::class, 'delete'])->name('portofolio.delete');
    // category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

});
