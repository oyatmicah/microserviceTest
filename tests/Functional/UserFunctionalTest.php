<?php

namespace Tests\Functional;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserFunctionalTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_endpoint_dispatches_event()
    {
        $userData = [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe'
        ];

        $this->expectsEvents(\App\Events\UserCreated::class);

        $this->postJson('/users', $userData);
    }
}
