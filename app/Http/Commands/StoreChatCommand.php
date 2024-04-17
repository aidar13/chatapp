<?php

declare(strict_types=1);

namespace App\Http\Commands;

use App\Http\DTO\StoreChatDTO;

final readonly class StoreChatCommand
{
    public function __construct(
        public StoreChatDTO $DTO
    ) {
    }
}
