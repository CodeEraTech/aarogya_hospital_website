<?php

namespace App\Services;

use App\Models\Patient;
use Illuminate\Support\Str;

class PatientService
{
    public function findOrCreate(string $name, string $phone, ?string $email = null): Patient
    {
        $phone = $this->normalizePhone($phone);
        $patient = Patient::firstOrCreate(['phone' => $phone], [
            'patient_id' => 'PAT-'.now()->format('ymd').'-'.Str::upper(Str::random(6)),
            'name' => $name,
            'email' => $email,
        ]);
        $patient->update(array_filter(['name' => $name, 'email' => $email], fn ($value) => filled($value)));
        return $patient;
    }

    public function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone);
        $local = substr($digits, -10);
        return '91'.$local;
    }
}
