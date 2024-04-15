<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Http\Contracts\Repositories\CreateUserRepository;
use App\Models\User;
use Throwable;

final class UserRepository implements CreateUserRepository
{
    /**
     * @throws Throwable
     */
    public function create(User $user): void
    {
        $user->saveOrFail();
    }
}
