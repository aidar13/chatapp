<?php

namespace Tests\Feature;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGetUserProfile(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('v1.profile'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'email',
                    'lastName',
                    'firstName',
                ]
            ])->assertJsonPath('data.id', $user->id);
    }

    public function testGetUsersPaginated(): void
    {
        $users = User::factory()->count(10)->create();

        $response = $this->actingAs($users->first())
            ->get(route('v1.users.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'email',
                        'lastName',
                        'firstName',
                    ]
                ]
            ])->assertJsonPath('data.*.id', $users->pluck('id')->toArray());
    }

    public function testGetUserChats(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        Chat::factory()
            ->count(5)
            ->create()
            ->each(function (Chat $chat) use ($user) {
               ChatUser::factory()->create([
                   'chat_id' => $chat->id,
                   'user_id' => $user->id,
               ]);
               Message::factory()->create([
                   'chat_id' => $chat->id
               ]);
            });

        $response = $this->actingAs($user)
            ->get(route('v1.users.chats'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'chatId',
                        'message' => [
                            'id',
                            'text',
                            'createdAt'
                        ],
                        'users' => [
                            '*' => [
                                'id',
                                'email',
                                'lastName',
                                'firstName',
                            ]
                        ]
                    ]

                ]
            ]);
    }
}
