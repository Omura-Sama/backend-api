<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ServiceCategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AddonController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Phase 3: Master Data Endpoints
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('service-categories', ServiceCategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('addons', AddonController::class);
});
