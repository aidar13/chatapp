<?php

declare(strict_types=1);

namespace App\Http\Contracts\Queries;

use App\Http\DTO\UserChatDTO;
use App\Models\Chat;
use Illuminate\Pagination\LengthAwarePaginator;

interface ChatQuery
{
    public function findById(int $id): Chat;

    public function getLatestChats(UserChatDTO $DTO): LengthAwarePaginator;
}
