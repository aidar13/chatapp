<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Message;

/**
 * @OA\Schema(
 *     @OA\Property(
 *          property="id",
 *          type="integer"
 *     ),
 *
 *     @OA\Property(
 *          property="text",
 *          type="string"
 *     ),
 *
 *     @OA\Property(
 *          property="createdAt",
 *          type="string"
 *     ),
 * )
 *
 * @property-read Message $resource
 */
class MessageResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id'        => $this->resource->id,
            'text'      => $this->resource->text,
            'createdAt' => $this->resource->created_at->toDateTimeString(),
        ];
    }
}
