<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use App\Http\Commands\AttachChatUsersCommand;
use App\Http\Commands\StoreChatCommand;
use App\Http\Contracts\Repositories\CreateChatRepository;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

final readonly class StoreChatHandler
{
    public function __construct(
        private CreateChatRepository $repository,
    ) {
    }

    public function handle(StoreChatCommand $command): void
    {
        $chat             = new Chat();
        $chat->created_by = Auth::id();

        $this->repository->create($chat);

        dispatch(new AttachChatUsersCommand(
            $chat->id,
            [
                $chat->created_by,
                $command->DTO->userId
            ]
        ));
    }
}
