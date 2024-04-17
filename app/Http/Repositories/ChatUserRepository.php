<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Http\Contracts\Repositories\CreateChatUserRepository;
use App\Models\ChatUser;
use Throwable;

final class ChatUserRepository implements CreateChatUserRepository
{
    /**
     * @throws Throwable
     */
    public function create(ChatUser $chatUser): void
    {
        $chatUser->saveOrFail();
    }
}
