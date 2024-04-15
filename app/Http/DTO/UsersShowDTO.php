<?php

declare(strict_types=1);

namespace App\Http\DTO;

use App\Http\Requests\UsersShowRequest;

final class UsersShowDTO
{
    public int $limit;
    public int $page;

    public static function fromRequest(UsersShowRequest $request): self
    {
        $self        = new self();
        $self->limit = (int)$request->get('limit', 20);
        $self->page  = (int)$request->get('page', 1);
        return $self;
    }
}
