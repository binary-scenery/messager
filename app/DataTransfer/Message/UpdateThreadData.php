<?php

namespace App\DataTransfer\Message;

use App\Models\Thread;

class UpdateThreadData {

    public function __construct(
        public Thread $thread,
        public string $title,
    ){}

}