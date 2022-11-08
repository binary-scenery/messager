<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    // @see App\Policies\MessagePolicy for full authorization
    public function authorize() : bool
    {
        return (bool) auth()->user();
    }

    public function rules() : array
    {
        return [
            'message_text' => ['required', 'string']
        ];
    }
}
