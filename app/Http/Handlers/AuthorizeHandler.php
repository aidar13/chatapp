<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use App\Http\Commands\AuthorizeCommand;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\NewAccessToken;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final readonly class AuthorizeHandler
{
    public function handle(AuthorizeCommand $command): NewAccessToken
    {
        $credentials = [
            'email'    => $command->email,
            'password' => $command->password
        ];

        if (!Auth::guard('web')->attempt($credentials)) {
            throw new NotFoundHttpException('User not found');
        }

        /** @var User $user */
        $user = Auth::guard('web')->user();

        return $user->createToken('Personal Access Token');
    }
}
