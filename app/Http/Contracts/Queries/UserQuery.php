<?php

declare(strict_types=1);

namespace App\Http\Contracts\Queries;

use App\Http\DTO\UsersShowDTO;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserQuery
{
    public function findUserById(int $id): User;

    public function findUserByEmail(string $email): User;

    public function getAllUsers(UsersShowDTO $DTO): LengthAwarePaginator;
}
