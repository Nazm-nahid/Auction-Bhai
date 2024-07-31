<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class LoginRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    
    public function authorize(): bool
    {
        return true;
    }
 
    public function rules(): array
    {
        return [
            'email'=>[
                'required',
                'email',
                'exists:users,email',
            ],
            'password' => [
            'required',
            'min:6',
            ]
        ];
    }

    public function messages()
    {
        return [
                'email.exists' => 'User doesn\'t exist!!!',
        ];
    }

    
}
