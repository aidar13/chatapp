<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Contracts\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersShowRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    public function __construct(private readonly UserService $service)
    {
    }

    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function index(UsersShowRequest $request): UsersResource
    {
        return new UsersResource(
            $this->service->getAllUsers($request->getDTO())
        );
    }
}
