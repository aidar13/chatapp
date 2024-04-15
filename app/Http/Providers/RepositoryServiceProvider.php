<?php

declare(strict_types=1);

namespace App\Http\Providers;

use App\Http\Contracts\Repositories\CreateUserRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreateUserRepository::class => UserRepository::class,
    ];

    public function register(): void
    {
    }
}
