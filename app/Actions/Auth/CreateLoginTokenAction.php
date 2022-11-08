<?php

namespace App\Actions\Auth ;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\DataTransfer\Auth\CreateLoginTokenData;

class CreateLoginTokenAction {

    public function __invoke(CreateLoginTokenData $data): string
    {
        $user = User::where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($data->device_name)->plainTextToken;
    }
}