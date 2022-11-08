<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function apiLogin(User $user = null) : User
    {
        $user = $user ?? User::first() ?? User::factory()->create()->first();

        $this->actingAs($user, 'sanctum');

        return $user;
    }
}
