<?php

declare(strict_types=1);

namespace App\Http\Contracts\Repositories;

use App\Models\Chat;

interface CreateChatRepository
{
    public function create(Chat $chat);
}
