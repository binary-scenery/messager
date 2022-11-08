<?php

namespace App\DataTransfer\Message;

use App\Models\User;
use App\Models\Thread;

class CreateMessageData {

    public function __construct(
        public Thread $thread,
        public User $user,
        public string $message_text,
    ) {}

}