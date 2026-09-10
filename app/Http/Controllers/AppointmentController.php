<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    public function store(StoreAppointmentRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Appointment::create([
            'reference' => 'APT-'.now()->format('ymd').'-'.Str::upper(Str::random(6)),
            'patient_name' => $validated['name'],
            'mobile_number' => preg_replace('/\D+/', '', $validated['phone']),
            'email' => $validated['email'] ?? null,
            'speciality' => $validated['speciality'],
            'preferred_doctor' => $validated['doctor'] ?? null,
            'preferred_date' => $validated['date'] ?? null,
            'preferred_time' => $validated['time'] ?? null,
            'message' => $validated['message'] ?? null,
            'source' => 'Website',
            'status' => 'New',
        ]);

        return back()->with('appointment_success', true);
    }
}
