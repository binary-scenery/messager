<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;

class MeController extends Controller
{
    public function __invoke()
    {
        return new UserResource(request()->user());
    }
}
