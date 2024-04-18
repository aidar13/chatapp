<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Contracts\Services\ChatService;
use App\Http\Contracts\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserChatRequest;
use App\Http\Requests\UsersShowRequest;
use App\Http\Resources\UserChatsResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
        private readonly ChatService $chatService
    ) {
    }

    public function profile(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function index(UsersShowRequest $request): UsersResource
    {
        return new UsersResource(
            $this->userService->getAllUsers($request->getDTO())
        );
    }

    public function chats(UserChatRequest $request): UserChatsResource
    {
        $dto = $request->getDTO();
        $dto->setUserId((int)Auth::id());

        return new UserChatsResource(
            $this->chatService->getLatestChats(
                $dto
            )
        );
    }
}
