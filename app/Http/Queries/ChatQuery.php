<?php

declare(strict_types=1);

namespace App\Http\Queries;

use App\Http\Contracts\Queries\ChatQuery as ChatQueryContract;
use App\Http\DTO\UserChatDTO;
use App\Models\Chat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class ChatQuery implements ChatQueryContract
{
    public function findById(int $id): Chat
    {
        /** @var Chat */
        return Chat::query()
            ->findOrFail($id);
    }

    public function getLatestChats(UserChatDTO $DTO): LengthAwarePaginator
    {
        return Chat::query()
            ->select('chats.*')
            ->leftJoin('messages', 'chats.id', '=', 'messages.chat_id')
            ->when($DTO->userId, function (Builder $query) use ($DTO) {
                $query->whereRelation('chatUsers', 'user_id', $DTO->userId);
            })
            ->groupBy('chats.id')
            ->orderByDesc(DB::raw('MAX(messages.created_at)'))
            ->paginate($DTO->limit, ['*'], 'page', $DTO->page);
    }
}
