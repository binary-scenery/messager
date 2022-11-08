<?php

namespace App\DataTransfer\Message;

use App\Models\User;

class CreateThreadData {

    public function __construct(
        public User $user,
        public ?string $title,
    )
    {}
}