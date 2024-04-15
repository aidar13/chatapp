<?php

declare(strict_types=1);

namespace App\Http\Providers;

use App\Http\Commands\AuthorizeCommand;
use App\Http\Commands\RegisterCommand;
use App\Http\Handlers\AuthorizeHandler;
use App\Http\Handlers\RegisterHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

final class CommandBusCompanyServiceProvider extends ServiceProvider
{
    private array $maps = [
        RegisterCommand::class  => RegisterHandler::class,
        AuthorizeCommand::class => AuthorizeHandler::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerCommandHandlers();
    }

    private function registerCommandHandlers(): void
    {
        Bus::map($this->maps);
    }
}
