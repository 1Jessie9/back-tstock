<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Registro y autenticación de usuarios
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/products', [ProductController::class, 'getProducts']);

// Rutas que requieren autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'show']);
    Route::delete('/user', [UserController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/check-superadmin-permission', [UserController::class, 'checkSuperAdminPermission']);

    // Admin
    Route::post('/create-product', [ProductController::class, 'store']);
});
