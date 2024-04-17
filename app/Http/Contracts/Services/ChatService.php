<?php

declare(strict_types=1);

namespace App\Http\Contracts\Services;

use App\Http\DTO\UserChatDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ChatService
{
    public function getLatestChats(UserChatDTO $DTO): LengthAwarePaginator;
}
