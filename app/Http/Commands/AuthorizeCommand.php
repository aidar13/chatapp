<?php

declare(strict_types=1);

namespace App\Http\Commands;

final readonly class AuthorizeCommand
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}
