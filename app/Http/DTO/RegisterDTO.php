<?php

declare(strict_types=1);

namespace App\Http\DTO;

use App\Http\Requests\RegisterRequest;
use App\Http\Traits\ToArrayTrait;

final class RegisterDTO
{
    use ToArrayTrait;

    public string $email;
    public string $password;
    public string $lastName;
    public string $firstName;

    public static function fromRequest(RegisterRequest $request): self
    {
        $self            = new self();
        $self->email     = $request->get('email');
        $self->password  = $request->get('password');
        $self->firstName = $request->get('firstName');
        $self->lastName  = $request->get('lastName');

        return $self;
    }
}
