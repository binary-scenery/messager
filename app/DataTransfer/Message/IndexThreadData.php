<?php

namespace App\DataTransfer\Message;

use App\Models\User;

class IndexThreadData {

    public function __construct(
        public User $user,
        public ?string $term = null
    ){}

}