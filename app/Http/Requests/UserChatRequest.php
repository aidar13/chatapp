<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\DTO\UserChatDTO;
use Illuminate\Foundation\Http\FormRequest;

class UserChatRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => ['nullable', 'integer'],
            'page'  => ['nullable', 'integer'],
        ];
    }

    public function getDTO(): UserChatDTO
    {
        return UserChatDTO::fromRequest($this);
    }
}
