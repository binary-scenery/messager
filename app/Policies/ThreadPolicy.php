<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thread;
use App\Models\ThreadUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Thread $thread) : bool
    {
       return ThreadUser::firstWhere(['user_id' => $user->id, 'thread_id' => $thread->id])->exists();
    }

    public function update(User $user, Thread $thread) : bool
    {
        return ($user->id === $thread->user_id);
    }

    public function delete(User $user, Thread $thread) : bool
    {
        return ($user->id === $thread->user_id);
    }
}
