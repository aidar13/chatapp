<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('/register', [AuthController::class, 'register'])
    ->name('v1.auth.register');

Route::post('/token', [AuthController::class, 'token'])
    ->name('v1.auth.token');


//User
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [UserController::class, 'me'])
        ->name('v1.users.me');

    Route::get('/users', [UserController::class, 'index'])
        ->name('v1.users.index');
});
