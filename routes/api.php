<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StepController;

Route::apiResource('steps', StepController::class)->only(['index', 'show']);
Route::post('steps/{step}/complete', [StepController::class, 'complete']);