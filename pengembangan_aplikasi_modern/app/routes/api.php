<?php

use App\Http\Controllers\Api\AlatApiController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - RESTful Standard dengan Bearer Token (Laravel Sanctum)
|--------------------------------------------------------------------------
*/

// Public Routes (Autentikasi)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Butuh Header Authorization: Bearer {{bearer_token}})
Route::middleware('auth:sanctum')->group(function () {
    // Auth Endpoints
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Resource Endpoints (CRUD Alat Medis)
    Route::apiResource('alats', AlatApiController::class);
});
