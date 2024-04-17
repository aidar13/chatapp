<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\DTO\SendMessageDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SendMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'chatId' => ['required', 'integer', 'exists:chats,id'],
            'text'   => ['required', 'string'],
        ];
    }

    public function getDTO(): SendMessageDTO
    {
        return SendMessageDTO::fromRequest($this);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
