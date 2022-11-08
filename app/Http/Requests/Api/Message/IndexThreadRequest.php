<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class IndexThreadRequest extends FormRequest
{
    public function authorize() : bool
    {
        return (bool) auth()->user();
    }

    public function rules() : array
    {
        return [
            'term' => ['sometimes', 'nullable', 'string', 'max:100']
        ];
    }
}
