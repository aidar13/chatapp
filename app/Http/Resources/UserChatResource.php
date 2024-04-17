<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Chat;

/**
 * @OA\Schema(
 *     @OA\Property(
 *          property="chatId",
 *          type="integer"
 *     ),
 *
 *     @OA\Property(property="message", type="object", ref="#/components/schemas/MessageResource"),
 *
 *     @OA\Property(
 *          property="users",
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/UserResource")
 *     ),
 * )
 *
 * @property-read Chat $resource
 */
class UserChatResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'chatId'  => $this->resource->id,
            'message' => new MessageResource($this->resource->latestMessage),
            'users'   => UserResource::collection($this->resource->users),
        ];
    }
}
