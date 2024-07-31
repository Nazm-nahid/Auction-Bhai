<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService) 
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request){

        $data = $request->validated();

        $user = $this->authService->createUser($data['name'], $data['email'], $data['password']);
        $token = $user->createToken("mytoken")->accessToken;

        return response()->json([
            "status" => true,
            "message" => "User registered successfully",
            "data" => [
                "token" => $token,
            ]
        ]);
    }

    // POST [ email, password ]
    public function login(LoginRequest $request){

        $validated = $request->safe()->only(['email','password']);
        $user = User::where("email", $validated['email'])->first();

        if($this->authService->validateUser( $validated['password'], $user->password )){

            // Password matched
            $token = $user->createToken("mytoken")->accessToken;

            return response()->json([
                "status" => true,
                "message" => "Login successful",
                "data" => [
                    "token" => $token,
                ],
            ]);
        }else{

            return response()->json([
                "status" => false,
                "message" => "Password didn't match",
                "data" => []
            ]);
        }
        
    }

    // GET [Auth: Token]
    public function profile(){

        $userData = auth()->user();

        return response()->json([
            "status" => true,
            "message" => "Profile information",
            "data" => $userData,
        ]);
    }

     // GET [Auth: Token]
     public function logout(){

        $token = auth()->user()->token();

        $token->revoke();

        return response()->json([
            "status" => true,
            "message" => "User Logged out successfully"
        ]);
     }
}
