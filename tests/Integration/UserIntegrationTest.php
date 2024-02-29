<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class UserIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_endpoint_creates_user()
    {
        $userData = [
            'email' => 'example@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe'
        ];

        $response = $this->postJson('/users', $userData);

        $response->assertStatus(201);
    }

    public function test_store_endpoint_validates_request()
    {
        $userData = [
            // Missing required fields
        ];

        $response = $this->postJson('/users', $userData);

        $response->assertStatus(422); 
    }
}
