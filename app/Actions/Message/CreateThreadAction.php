<?php

namespace App\Actions\Message;

use App\Models\Thread;
use App\DataTransfer\Message\CreateThreadData;

class CreateThreadAction {

    public function __invoke(CreateThreadData $data) : Thread
    {
        $thread = Thread::create([
            'user_id' => auth()->user()->id,
            'title' => $data->title
        ]);

        $thread->users()->attach(auth()->user()->id);

        return $thread;
    }
}