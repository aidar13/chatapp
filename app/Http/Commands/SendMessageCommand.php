<?php

declare(strict_types=1);

namespace App\Http\Commands;

use App\Http\DTO\SendMessageDTO;

final readonly class SendMessageCommand
{
    public function __construct(
        public SendMessageDTO $DTO
    ) {
    }
}
