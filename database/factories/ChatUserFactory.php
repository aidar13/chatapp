<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ChatUser>
 */
class ChatUserFactory extends Factory
{
    protected $model = ChatUser::class;

    public function definition(): array
    {
        return [
            'chat_id' => Chat::factory()->create(),
            'user_id' => User::factory()->create(),
        ];
    }
}
