<?php

namespace App\Actions\Message;

use App\Models\Thread;
use App\DataTransfer\Message\UpdateThreadData;

class UpdateThreadAction {

    public function __invoke(UpdateThreadData $data) : Thread
    {
        $data->thread->update([
            'user_id' => auth()->user()->id,
            'title' => $data->title
        ]);

        return $data->thread->fresh();
    }
}