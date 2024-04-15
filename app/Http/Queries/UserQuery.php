<?php

declare(strict_types=1);

namespace App\Http\Queries;

use App\Http\Contracts\Queries\UserQuery as UserQueryContract;
use App\Http\DTO\UsersShowDTO;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class UserQuery implements UserQueryContract
{
    public function findUserById(int $id): User
    {
        /** @var User */
        return User::query()
            ->firstOrFail($id);
    }

    public function findUserByEmail(string $email): User
    {
        /** @var User */
        return User::query()
            ->where('email', $email)
            ->firstOrFail();
    }

    public function getAllUsers(UsersShowDTO $DTO): LengthAwarePaginator
    {
        return User::query()
            ->paginate($DTO->limit, ['*'], 'page', $DTO->page);
    }
}
