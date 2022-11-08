<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\CreateLoginTokenAction;
use App\DataTransfer\Auth\CreateLoginTokenData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function __invoke(
        LoginRequest $request,
        CreateLoginTokenAction $createLoginTokenAction
    ) : JsonResponse
    {
        return new JsonResponse([
            'data' => [
                'token' => $createLoginTokenAction(new CreateLoginTokenData(...$request->validated()))
            ]],
            Response::HTTP_OK
        );
    }
}
