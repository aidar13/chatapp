<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $chat_id
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class ChatUser extends Model
{
    use HasFactory;

    protected $table = 'chats_users';
}
