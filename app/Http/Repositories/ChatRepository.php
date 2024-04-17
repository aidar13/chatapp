<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Http\Contracts\Repositories\CreateChatRepository;
use App\Models\Chat;
use Throwable;

final class ChatRepository implements CreateChatRepository
{
    /**
     * @throws Throwable
     */
    public function create(Chat $chat): void
    {
        $chat->saveOrFail();
    }
}
