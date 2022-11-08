<?php

namespace App\DataTransfer\Message;

use App\Models\Message;

class UpdateMessageData {

    public function __construct(
        public Message $message,
        public string $message_text
    ){}

}