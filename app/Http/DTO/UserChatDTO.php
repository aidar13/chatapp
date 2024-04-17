<?php

declare(strict_types=1);

namespace App\Http\DTO;

use App\Http\Requests\UserChatRequest;

final class UserChatDTO
{
    public ?int $userId = null;
    public int $limit;
    public int $page;

    public static function fromRequest(UserChatRequest $request): self
    {
        $self        = new self();
        $self->limit = (int)$request->get('limit', 20);
        $self->page  = (int)$request->get('page', 1);

        return $self;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
