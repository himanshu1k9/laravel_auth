<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

    Route::post('/register/jwt', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
    });
