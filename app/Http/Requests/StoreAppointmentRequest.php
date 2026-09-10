<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'phone' => ['required', 'regex:/^[0-9 +()-]{10,18}$/'],
            'email' => ['nullable', 'email:rfc', 'max:120'],
            'speciality' => ['required', 'in:Orthopaedics,Robotic Joint Replacement,Infertility & IVF,Trauma,Other'],
            'doctor' => ['nullable', 'string', 'max:100'],
            'date' => ['nullable', 'date', 'after_or_equal:today'],
            'time' => ['nullable', 'string', 'max:80'],
            'message' => ['nullable', 'string', 'max:800'],
        ];
    }
}
