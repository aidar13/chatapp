<?php

use App\Http\Controllers\V1\AuthController;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('/register', [AuthController::class, 'register'])
    ->name('v1.auth.register');

Route::post('/token', [AuthController::class, 'token'])
    ->name('v1.auth.token');
