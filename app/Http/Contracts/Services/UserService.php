<?php

declare(strict_types=1);

namespace App\Http\Contracts\Services;

use App\Http\DTO\UsersShowDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserService
{
    public function getAllUsers(UsersShowDTO $DTO): LengthAwarePaginator;
}
