<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [ProductController::class, 'dashboard']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{product_id}/edit', [ProductController::class, 'edit']);
Route::put('/products/{product_id}', [ProductController::class, 'update']);
Route::delete('/products/{product_id}', [ProductController::class, 'destroy']);