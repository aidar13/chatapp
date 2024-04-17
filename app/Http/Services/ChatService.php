<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Contracts\Queries\ChatQuery;
use App\Http\Contracts\Services\ChatService as ChatServiceContract;
use App\Http\DTO\UserChatDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final readonly class ChatService implements ChatServiceContract
{
    public function __construct(
        private ChatQuery $query
    ) {
    }

    public function getLatestChats(UserChatDTO $DTO): LengthAwarePaginator
    {
        return $this->query->getLatestChats($DTO);
    }
}
