<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User;

/**
 * @OA\Schema(
 *     @OA\Property(
 *          property="id",
 *          type="integer"
 *     ),
 *
 *     @OA\Property(
 *          property="email",
 *          type="string"
 *     ),
 *
 *     @OA\Property(
 *          property="firstName",
 *          type="string"
 *     ),
 *
 *     @OA\Property(
 *          property="lastName",
 *          type="string"
 *     )
 * )
 *
 * @property-read User $resource
 */
class UserResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id'        => $this->resource->id,
            'email'     => $this->resource->email,
            'lastName'  => $this->resource->last_name,
            'firstName' => $this->resource->first_name,
        ];
    }
}
