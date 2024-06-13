<?php

namespace Karaev\Common\Infrastructure\Http\Request\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactSendRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:4000'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'The subject field is required.',
            'subject.string' => 'The subject field must be a string.',
            'subject.max' => 'The subject field must not exceed 255 characters.',
            'message.required' => 'The message field is required.',
            'message.string' => 'The message field must be a string.',
            'message.max' => 'The subject field must not exceed 4000 characters.',
        ];
    }
}
