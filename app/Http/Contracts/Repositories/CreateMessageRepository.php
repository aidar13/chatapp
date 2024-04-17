<?php

declare(strict_types=1);

namespace App\Http\Contracts\Repositories;

use App\Models\Message;

interface CreateMessageRepository
{
    public function create(Message $message);
}
