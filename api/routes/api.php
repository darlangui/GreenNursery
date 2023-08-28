<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/plant', [\App\Http\Controllers\PlantController::class, 'index']);
Route::get('/plant/{id}', [\App\Http\Controllers\PlantController::class, 'show']);
Route::get('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/client', [\App\Http\Controllers\ClientController::class, 'store']);
Route::post('/loginClient', [\App\Http\Controllers\ClientController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/category', \App\Http\Controllers\CategoryController::class)->except(['index', 'show']);
    Route::apiResource('/plant', \App\Http\Controllers\PlantController::class)->except(['index', 'show']);
    Route::apiResource('/user', \App\Http\Controllers\UserController::class)->except(['store']);
    Route::apiResource('/client', \App\Http\Controllers\ClientController::class)->except(['store', 'login']);
});