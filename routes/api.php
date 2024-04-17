<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\ChatController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('/register', [AuthController::class, 'register'])
    ->name('v1.auth.register');

Route::post('/token', [AuthController::class, 'token'])
    ->name('v1.auth.token');


Route::middleware('auth:sanctum')->group(function () {
    //User
    Route::get('/me', [UserController::class, 'me'])
        ->name('v1.users.me');

    Route::get('/users', [UserController::class, 'index'])
        ->name('v1.users.index');

    //Chat
    Route::post('/chats', [ChatController::class, 'store'])
        ->name('v1.chats.store');
});
