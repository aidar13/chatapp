<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Commands\AuthorizeCommand;
use App\Http\Commands\RegisterCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorizeRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\MessagesResource;
use App\Http\Resources\TokenResource;

final class AuthController extends Controller
{
    public function register(RegisterRequest $request): MessagesResource
    {
        $this->dispatch(new RegisterCommand(
            $request->getDTO()
        ));

        return (new MessagesResource(null))
            ->setMessage('Успешно зарегистрированы!');
    }

    public function token(AuthorizeRequest $request): TokenResource
    {
        $token = $this->dispatchSync(new AuthorizeCommand(
            $request->get('email'),
            $request->get('password')
        ));

        return new TokenResource($token);
    }
}
