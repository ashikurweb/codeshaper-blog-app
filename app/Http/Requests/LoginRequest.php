<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     => ['required', 'string', 'email', 'max:255'],
            'password'  => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }
}