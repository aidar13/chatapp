<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\DTO\UsersShowDTO;
use Illuminate\Foundation\Http\FormRequest;

class UsersShowRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => ['nullable', 'integer'],
            'page'  => ['nullable', 'integer'],
        ];
    }

    public function getDTO(): UsersShowDTO
    {
        return UsersShowDTO::fromRequest($this);
    }
}
