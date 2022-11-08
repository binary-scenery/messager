<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class IndexMessageRequest extends FormRequest
{
    // @ see App\Policies\MessagePolicy
    public function authorize()
    {
        return auth()->user();
    }

    public function rules() : array
    {
        return [
            'term' => ['sometimes', 'nullable', 'string', 'max:100']
        ];
    }
}
