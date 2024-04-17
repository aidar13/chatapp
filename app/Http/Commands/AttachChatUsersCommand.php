<?php

declare(strict_types=1);

namespace App\Http\Commands;

final readonly class AttachChatUsersCommand
{
    public function __construct(
        public int $chatId,
        public array $userIds
    ) {
    }
}
