<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $created_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read Message|null $latestMessage
 * @property-read Collection|ChatUser[] $chatUsers
 * @property-read Collection|User[] $users
 * @property-read Collection|Message[] $messages
 */
final class Chat extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function chatUsers(): HasMany
    {
        return $this->hasMany(ChatUser::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'chats_users');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function latestMessage(): HasOne
    {
        return $this->hasOne(Message::class)
            ->orderByDesc('created_at');
    }
}
