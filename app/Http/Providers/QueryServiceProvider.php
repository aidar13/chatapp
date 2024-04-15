<?php

declare(strict_types=1);

namespace App\Http\Providers;

use App\Http\Contracts\Queries\UserQuery as UserQueryContract;
use App\Http\Queries\UserQuery;
use Illuminate\Support\ServiceProvider;

final class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserQueryContract::class => UserQuery::class,
    ];
}
