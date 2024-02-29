<?php

namespace Tests\Unit;

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_user()
    {
        $controller = new UserController();

        $request = new Request([
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe'
        ]);

        $response = $controller->store($request);

        $this->assertEquals(201, $response->status());
    }

    public function test_store_method_validates_request()
    {
        $controller = new UserController();

        $request = new Request([
            // any required Missing fields
        ]);

        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $controller->store($request);
    }
}
