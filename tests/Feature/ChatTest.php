<?php

namespace Tests\Feature;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testCreateChat(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var User $user2 */
        $user2 = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson(route('v1.chats.store', [
                'userId' => $user2->id
            ]));

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Успешно создан!'
            ]);

        $this->assertDatabaseHas('chats_users', [
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('chats_users', [
            'user_id' => $user2->id,
        ]);
    }

    public function testSendMessageToChat(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Chat $chat */
        $chat = Chat::factory()->create();
        /** @var Message $message */
        $message = Message::factory()->make();

        $data = [
            'chatId' => $chat->id,
            'text'   => $message->text,
        ];

        $response = $this->actingAs($user)
            ->postJson(
                route('v1.chats.send-message'),
                $data
            );

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Сообщение успешно отправлено!'
            ]);

        $this->assertDatabaseHas('messages', [
            'chat_id' => $chat->id,
            'text'    => $message->text,
        ]);
    }
}
