<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{

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
