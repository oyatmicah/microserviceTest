<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
        ]);

        $user = User::create($request->only('email', 'firstName', 'lastName'));

        // Dispatch event after user creation handled by the queue in laravel
        event(new \App\Events\UserCreated($user));

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
}
