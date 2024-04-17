<?php

declare(strict_types=1);

namespace App\Http\Queries;

use App\Http\Contracts\Queries\ChatQuery as ChatQueryContract;
use App\Models\Chat;

final class ChatQuery implements ChatQueryContract
{
    public function findById(int $id): Chat
    {
        /** @var Chat */
        return Chat::query()
            ->findOrFail($id);
    }
}
