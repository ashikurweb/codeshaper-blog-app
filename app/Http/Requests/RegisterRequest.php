<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Name is required',
            'email.required'    => 'Email is required',
            'email.email'       => 'Email is not valid',
            'email.unique'      => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min'      => 'Password must be at least 6 characters',
            'password.confirmed'=> 'Password doesn\'t match',
        ];
    }
}