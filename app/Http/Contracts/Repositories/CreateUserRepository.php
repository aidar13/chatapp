<?php

declare(strict_types=1);

namespace App\Http\Contracts\Repositories;

use App\Models\User;

interface CreateUserRepository
{
    public function create(User $user);
}
