<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

########## Routes for sanctum
Route::middleware([
    EnsureFrontendRequestsAreStateful::class,
    'auth:sanctum', // or 'throttle:api', etc.
    'throttle:api',
])->group(function () {
    Route::post('/register/jwt', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
    });
});

####### Routes for JWT Auth
    // Route::post('/register/jwt', [AuthController::class, 'register']);
    // Route::post('/login', [AuthController::class, 'login']);

    // Route::middleware('auth:api')->group(function () {
    //     Route::post('/logout', [AuthController::class, 'logout']);
    //     Route::get('/me', [AuthController::class, 'me']);
    // });
