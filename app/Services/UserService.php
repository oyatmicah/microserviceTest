<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function createUser(array $userData): User
    {
        return User::create($userData);
    }
}
