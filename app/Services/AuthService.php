<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repository\UserRepository;

class AuthService{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
      }

    public function createUser( $name, $email, $password )
    {
        return $this->userRepository->createUser( $name, $email, $password );
    }

    public function validateUser( $givenPassword, $userPassword )
    {
        return Hash::check($givenPassword, $userPassword);
    }
}