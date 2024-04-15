<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Contracts\Queries\UserQuery;
use App\Http\DTO\UsersShowDTO;
use App\Http\Contracts\Services\UserService as UserServiceContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final readonly class UserService implements UserServiceContract
{
    public function __construct(
        private UserQuery $query
    ) {
    }

    public function getAllUsers(UsersShowDTO $DTO): LengthAwarePaginator
    {
        return $this->query->getAllUsers($DTO);
    }
}
