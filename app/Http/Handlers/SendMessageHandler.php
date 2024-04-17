<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use App\Http\Commands\SendMessageCommand;
use App\Http\Contracts\Queries\ChatQuery;
use App\Http\Contracts\Repositories\CreateMessageRepository;
use App\Models\Message;

final readonly class SendMessageHandler
{
    public function __construct(
        private ChatQuery $query,
        private CreateMessageRepository $repository,
    ) {
    }

    public function handle(SendMessageCommand $command): void
    {
        $chat = $this->query->findById($command->DTO->chatId);

        $message          = new Message();
        $message->chat_id = $chat->id;
        $message->message = $command->DTO->message;
        $this->repository->create($message);
    }
}
