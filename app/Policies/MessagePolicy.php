<?php

namespace App\Policies;


use App\Models\User;
use App\Models\Thread;
use App\Models\Message;
use App\Models\ThreadUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    // to check if a user can read a message we to know if they are part of the thread:
    public function view(User $user, Thread $thread) : bool
    {
       return ThreadUser::where(['user_id' => $user->id, 'thread_id' => $thread->id])->exists();
    }

    public function create(User $user, Thread $thread) : bool
    {
       return ThreadUser::where(['user_id' => $user->id, 'thread_id' => $thread->id])->exists();
    }

    public function update(User $user, Message $message): bool
    {
        return ($user->id === $message->user_id);
    }

    public function delete(User $user, Message $message): bool
    {
        return ($user->id === $message->user_id);
    }
}
