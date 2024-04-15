<?php

declare(strict_types=1);

namespace App\Http\Providers;

use Illuminate\Support\ServiceProvider;

final class RegisterModuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(CommandBusCompanyServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(QueryServiceProvider::class);
        $this->app->register(BindServiceProvider::class);
    }
}
