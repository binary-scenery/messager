<?php

namespace App\Actions\Message;

use App\DataTransfer\Message\CreateMessageData;
use App\Models\Message;

class CreateMessageAction {

    public function __invoke(CreateMessageData $data) : Message
    {
        return Message::create([
            'message_text'   => $data->message_text,
            'thread_id' => $data->thread->id,
            'user_id'   => $data->user->id
        ]);
    }


}