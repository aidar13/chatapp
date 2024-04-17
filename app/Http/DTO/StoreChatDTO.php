<?php

declare(strict_types=1);

namespace App\Http\DTO;

use App\Http\Requests\StoreChatRequest;
use App\Http\Traits\ToArrayTrait;

final class StoreChatDTO
{
    use ToArrayTrait;

    public int $userId;

    public static function fromRequest(StoreChatRequest $request): self
    {
        $self         = new self();
        $self->userId = (int)$request->get('userId');

        return $self;
    }
}
