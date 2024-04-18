<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testRegisterUser(): void
    {
        /** @var User $user */
        $user = User::factory()->make();

        $data = [
            'email'     => $user->email,
            'firstName' => $user->first_name,
            'lastName'  => $user->last_name,
            'password'  => $this->faker->password()
        ];

        $response = $this->postJson(
            route('v1.auth.register'),
            $data
        );

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Успешно зарегистрированы!'
            ]);

        $this->assertDatabaseHas('users', [
            'email'      => $user->email,
            'last_name'  => $user->last_name,
            'first_name' => $user->first_name,
        ]);
    }

    public function testGetUserToken(): void
    {
        $password = $this->faker->numerify('########');

        /** @var User $user */
        $user = User::factory()->create([
            'password' => Hash::make($password)
        ]);

        $data = [
            'email'    => $user->email,
            'password' => $password
        ];

        $response = $this->postJson(
            route('v1.auth.token'),
            $data
        );

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'accessToken'
                ]
            ]);
    }
}
