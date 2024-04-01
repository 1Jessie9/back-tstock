<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Registro y autenticación de usuarios
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
// Productos sin autenticación
Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/productId', [ProductController::class, 'getProductById']);

// Rutas que requieren autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'show']);
    Route::delete('/user', [UserController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/check-superadmin-permission', [UserController::class, 'checkSuperAdminPermission']);

    // Admin
    Route::post('/create-product', [ProductController::class, 'store']);
    Route::delete('/delete-gallery', [ProductController::class, 'destroyImage']);
    Route::put('/update-title', [ProductController::class, 'updateProductTitle']);
});
