<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createUsers();
        $this->createChats();
    }

    private function createChats(): void
    {
        $users = User::all();

        Chat::factory()->count(10)
            ->create([
                'created_by' => $users->random(1)->first()->id
            ])
            ->each(function (Chat $chat) use ($users) {
                $chatUsers = $users->random(2);

                /** @var User $chatUser */
                foreach ($chatUsers as $chatUser) {
                    ChatUser::factory()->create([
                        'chat_id' => $chat->id,
                        'user_id' => $chatUser->id
                    ]);
                }

                Message::factory()
                    ->count(20)
                    ->create([
                        'chat_id' => $chat->id
                    ]);
            });

    }

    private function createUsers(): void
    {
        User::factory()->create([
            'email'    => 'admin@chatapp.com',
            'password' => Hash::make('password123')
        ]);

        User::factory()->count(10)->create();
    }
}
