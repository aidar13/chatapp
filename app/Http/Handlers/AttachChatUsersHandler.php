<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use App\Http\Commands\AttachChatUsersCommand;
use App\Http\Contracts\Repositories\CreateChatUserRepository;
use App\Models\ChatUser;

final readonly class AttachChatUsersHandler
{
    public function __construct(
        private CreateChatUserRepository $repository
    ) {
    }

    public function handle(AttachChatUsersCommand $command): void
    {
        foreach ($command->userIds as $userId) {
            $chatUser          = new ChatUser();
            $chatUser->chat_id = $command->chatId;
            $chatUser->user_id = $userId;

            $this->repository->create($chatUser);
        }
    }
}
