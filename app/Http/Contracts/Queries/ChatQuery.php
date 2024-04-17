<?php

declare(strict_types=1);

namespace App\Http\Contracts\Queries;

use App\Models\Chat;

interface ChatQuery
{
    public function findById(int $id): Chat;
}
