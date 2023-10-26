<?php

use App\Http\Controllers\Api\Admin\Category\CategoryController;
use App\Http\Controllers\Api\Admin\Color\ColorController;
use App\Http\Controllers\Api\Admin\Tag\TagController;
use App\Http\Controllers\Api\Admin\User\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'categories'], function () {
            Route::apiResource('category', CategoryController::class);
        });
        Route::group(['prefix' => 'users'], function () {
            Route::apiResource('user', UserController::class);
        });
        Route::group(['prefix' => 'tags'], function () {
            Route::apiResource('tag', TagController::class);
        });
        Route::group(['prefix' => 'colors'], function () {
            Route::apiResource('color', ColorController::class);
        });

    });
});
