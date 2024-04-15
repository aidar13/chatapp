<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\DTO\RegisterDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required', 'string', 'min:8'],
            'lastName'  => ['required', 'string'],
            'firstName' => ['required', 'string'],
        ];
    }

    public function getDTO(): RegisterDTO
    {
        return RegisterDTO::fromRequest($this);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
