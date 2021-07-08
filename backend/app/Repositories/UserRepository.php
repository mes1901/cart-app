<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getRegisteredUser ()
    {
        return User::where('type', User::REGISTERED)->first();
    }

    public function getUnregisteredUser ()
    {
        return User::where('type', User::GUEST)->first();
    }
}