<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StepController;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/steps', [StepController::class, 'index']);
    Route::get('/steps/{step}', [StepController::class, 'show']);
    Route::post('/steps/{step}/complete', [StepController::class, 'complete']);
});
