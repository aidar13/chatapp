<?php

declare(strict_types=1);

namespace App\Http\Resources;

final class UsersResource extends BaseResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => UserResource::collection($this->collection),
        ];
    }
}
