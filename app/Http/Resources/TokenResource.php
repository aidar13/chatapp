<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Laravel\Sanctum\NewAccessToken;

/**
 * @OA\Schema (
 *     @OA\Property(property="accessToken", type="string", example="SP00007576"),
 * )
 *
 * @property-read NewAccessToken $resource
 */
final class TokenResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'accessToken' => $this->resource->plainTextToken,
        ];
    }
}
