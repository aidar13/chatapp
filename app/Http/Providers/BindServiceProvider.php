<?php

declare(strict_types=1);

namespace App\Http\Providers;

use App\Http\Contracts\Services\UserService as UserServiceContract;
use App\Http\Services\UserService;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Services
        UserServiceContract::class => UserService::class
    ];
}
