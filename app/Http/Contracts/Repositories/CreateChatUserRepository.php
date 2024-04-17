<?php

declare(strict_types=1);

namespace App\Http\Contracts\Repositories;

use App\Models\ChatUser;

interface CreateChatUserRepository
{
    public function create(ChatUser $chatUser);
}
