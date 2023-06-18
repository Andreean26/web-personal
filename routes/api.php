<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PortofolioApiController;
use App\Http\Controllers\API\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::middleware('jwt.api')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('me', 'me');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });

    Route::controller(PortofolioApiController::class)->group(function () {
        Route::get('portofolio', 'index');
        Route::post('portofolio', 'create');
        Route::post('portofolio/{id}', 'edit');
        Route::delete('portofolio/{id}', 'delete');
    });

    Route::controller(CategoryApiController::class)->group(function () {
        Route::get('category', 'index');
        Route::post('category', 'create');
        Route::post('category/{id}', 'edit');
        Route::delete('category/{id}', 'delete');
    });
});



