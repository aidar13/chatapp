<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\ChatController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:10,1')
    ->prefix('v1')
    ->name('v1')
    ->group(function () {
        //Auth
        Route::post('/register', [AuthController::class, 'register'])
            ->name('.auth.register');

        Route::post('/token', [AuthController::class, 'token'])
            ->name('.auth.token');

        Route::middleware(['auth:sanctum', 'auth:api'])->group(function () {
            //User
            Route::get('/profile', [UserController::class, 'profile'])
                ->name('.profile');

            Route::get('/users', [UserController::class, 'index'])
                ->name('.users.index');

            Route::get('/users/chats', [UserController::class, 'chats'])
                ->name('.users.chats');

            //Chat
            Route::post('/chats', [ChatController::class, 'store'])
                ->name('.chats.store');

            Route::post('/chats/message', [ChatController::class, 'sendMessage'])
                ->name('.chats.send-message');
        });
});
