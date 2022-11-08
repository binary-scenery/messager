<?php

namespace Tests\Feature\Message;

use Tests\TestCase;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_index_threads()
    {
        User::factory()->hasThreads(3)->create();

        $this->apiLogin();

        $response = $this->get(route('thread.index'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee(Thread::first()->title);
    }

    public function test_a_user_can_create_threads()
    {
        $this->apiLogin();

        $response = $this->postJson(route('thread.store'), [
            'title' => 'Testing Thread'
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment(['title' => 'Testing Thread']);
    }

    public function test_a_user_can_update_threads()
    {
        User::factory()->hasThreads(1)->create();

        $this->apiLogin();

        $response = $this->patchJson(route('thread.update', 1), [
            'title' => 'Testing Thread Updated'
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment(['title' => 'Testing Thread Updated']);
    }
}
