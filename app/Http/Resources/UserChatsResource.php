<?php

declare(strict_types=1);

namespace App\Http\Resources;

final class UserChatsResource extends BaseResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => UserChatResource::collection($this->collection),
        ];
    }
}
