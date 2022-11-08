<?php

namespace App\Actions\Message;

use App\Models\Message;
use App\DataTransfer\Message\UpdateMessageData;

class UpdateMessageAction {

    public function __invoke(UpdateMessageData $data) : Message
    {
        $data->message->update([
            'message_text' => $data->message_text
        ]);

        return $data->message->fresh();
    }
}