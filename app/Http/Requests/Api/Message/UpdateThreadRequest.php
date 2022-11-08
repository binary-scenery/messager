<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThreadRequest extends FormRequest
{
    // @see App\Policies\ThreadPolicy for full authorisation
    public function authorize() : bool
    {
        return (bool) auth()->user();
    }

    public function rules() : array
    {
        return [
            'title' => ['required', 'nullable', 'string', 'max:255']
        ];
    }
}
