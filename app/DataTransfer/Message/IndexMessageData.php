<?php

namespace App\DataTransfer\Message;

use App\Models\Thread;

class IndexMessageData {

    public function __construct(
        public Thread $thread,
        public ?string $term = null
    ){}

}