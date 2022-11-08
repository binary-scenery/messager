<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_login() : void
    {
        $this->seed(UserSeeder::class);

        $response = $this->postJson(route('auth.login'), [
            'email' => 'test@example.com',
            'password' => 'password',
            'device_name' => 'test_device'
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_a_user_cannot_login_with_incorrect_password() : void
    {
        $this->seed(UserSeeder::class);

        $response = $this->postJson(route('auth.login'), [
            'email' => 'test@example.com',
            'password' => 'badpassword',
            'device_name' => 'test_device'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
