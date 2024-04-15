<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use App\Http\Commands\RegisterCommand;
use App\Http\Contracts\Repositories\CreateUserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final readonly class RegisterHandler
{
    public function __construct(
        private CreateUserRepository $repository,
    ) {
    }

    public function handle(RegisterCommand $command): void
    {
        $user             = new User();
        $user->email      = $command->DTO->email;
        $user->last_name  = $command->DTO->lastName;
        $user->first_name = $command->DTO->firstName;
        $user->password   = Hash::make($command->DTO->password);

        $this->repository->create($user);
    }
}
