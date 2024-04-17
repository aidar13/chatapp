<?php

declare(strict_types=1);

namespace App\Http\Providers;

use App\Http\Contracts\Repositories\CreateChatRepository;
use App\Http\Contracts\Repositories\CreateChatUserRepository;
use App\Http\Contracts\Repositories\CreateMessageRepository;
use App\Http\Contracts\Repositories\CreateUserRepository;
use App\Http\Repositories\ChatRepository;
use App\Http\Repositories\ChatUserRepository;
use App\Http\Repositories\MessageRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreateUserRepository::class     => UserRepository::class,
        CreateChatRepository::class     => ChatRepository::class,
        CreateChatUserRepository::class => ChatUserRepository::class,
        CreateMessageRepository::class  => MessageRepository::class,
    ];

    public function register(): void
    {
    }
}
