<?php

declare(strict_types=1);

namespace App\Http\DTO;

use App\Http\Requests\SendMessageRequest;
use App\Http\Traits\ToArrayTrait;

final class SendMessageDTO
{
    use ToArrayTrait;

    public int    $chatId;
    public string $text;

    public static function fromRequest(SendMessageRequest $request): self
    {
        $self         = new self();
        $self->chatId = (int)$request->get('chatId');
        $self->text   = $request->get('text');

        return $self;
    }
}
