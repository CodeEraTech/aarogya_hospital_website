<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'phone' => ['nullable', 'regex:/^[0-9 +()-]{10,18}$/'],
            'email' => ['nullable', 'email:rfc', 'max:120'],
            'department' => ['nullable', 'in:Orthopaedics,Robotic Joint Replacement,Infertility & IVF,Emergency & Trauma,Other'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'message' => ['required', 'string', 'min:10', 'max:1500'],
        ];
    }
}
