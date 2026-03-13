<?php

namespace App\Services;

use App\Models\User;


class UsersService
{
    public function create() : User
    {
        $user = new User();
        $user->save();

        return $user;
    }
}
