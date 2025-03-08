<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'     => ['required', 'string', 'max:255'],
            'author'    => ['required', 'string', 'max:255'],
            'content'   => ['required', 'string'],
            'category'  => ['required', 'string', 'max:255'],
            'status'    => ['required', 'string', 'in:draft,scheduled,published'],
            'published_at' => ['nullable', 'date', 'after_or_equal:now'],
            'user_id'   => ['required', 'exists:users,id'],
            'image'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'    => 'The title field is required.',
            'author.required'   => 'The author field is required.',
            'content.required'  => 'The content field is required.',
            'category.required' => 'The category field is required.',
            'status.required'   => 'The status field is required.',
            'user_id.required'  => 'The user field is required.',
        ];
    }
}
