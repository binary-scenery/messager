<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreThreadRequest extends FormRequest
{

    public function authorize() : bool
    {
        return (bool) auth()->user();
    }

    public function rules() : array
    {
        return [
            'title' => ['sometimes', 'nullable', 'string', 'max:255']
        ];
    }
}
