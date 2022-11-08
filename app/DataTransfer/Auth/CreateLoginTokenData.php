<?php

namespace App\DataTransfer\Auth ;

class CreateLoginTokenData {

    public function __construct(
        public string $email,
        public string $password,
        public string $device_name
    ) {}

}