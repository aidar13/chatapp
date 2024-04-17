<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\DTO\StoreChatDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreChatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userId' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function getDTO(): StoreChatDTO
    {
        return StoreChatDTO::fromRequest($this);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
