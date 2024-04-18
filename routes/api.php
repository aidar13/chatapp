<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\ChatController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:10,1')->group(function () {
    //Auth
    Route::post('/register', [AuthController::class, 'register'])
        ->name('v1.auth.register');

    Route::post('/token', [AuthController::class, 'token'])
        ->name('v1.auth.token');

    Route::middleware('auth:sanctum')->group(function () {
        //User
        Route::get('/profile', [UserController::class, 'profile'])
            ->name('v1.profile');

        Route::get('/users', [UserController::class, 'index'])
            ->name('v1.users.index');

        Route::get('/users/chats', [UserController::class, 'chats'])
            ->name('v1.users.chats');

        //Chat
        Route::post('/chats', [ChatController::class, 'store'])
            ->name('v1.chats.store');

        Route::post('/chats/{id}/message', [ChatController::class, 'sendMessage'])
            ->name('v1.chats.send-message');
    });
});
