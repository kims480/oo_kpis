<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'Name' => ['required'],
            'phone_number' => ['nullable'],
            'active' => ['nullable'],
            'notes' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
