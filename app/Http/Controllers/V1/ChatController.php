<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Commands\StoreChatCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChatRequest;
use App\Http\Resources\MessagesResource;

final class ChatController extends Controller
{
    public function store(StoreChatRequest $request): MessagesResource
    {
        $this->dispatch(new StoreChatCommand(
            $request->getDTO()
        ));

        return (new MessagesResource(null))
            ->setMessage('Успешно создан!');
    }
}
