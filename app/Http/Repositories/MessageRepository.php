<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Http\Contracts\Repositories\CreateMessageRepository;
use App\Models\Message;
use Throwable;

final class MessageRepository implements CreateMessageRepository
{
    /**
     * @throws Throwable
     */
    public function create(Message $message): void
    {
        $message->saveOrFail();
    }
}
