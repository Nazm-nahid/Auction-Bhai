<?php

namespace App\Repository;

use App\Models\User;

class UserRepository{

    public function createUser( $name, $email, $password )
    {
        return User::create([
            "name" => $name,
            "email" => $email,
            "password" => bcrypt($password)
        ]);
    }
}