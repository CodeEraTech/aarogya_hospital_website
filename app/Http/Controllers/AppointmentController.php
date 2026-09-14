<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use App\Services\PatientService;

class AppointmentController extends Controller
{
    public function store(StoreAppointmentRequest $request, PatientService $patients): RedirectResponse
    {
        $validated = $request->validated();

        $patient = $patients->findOrCreate($validated['name'], $validated['phone'], $validated['email'] ?? null);

        Appointment::create([
            'patient_id' => $patient->id,
            'patient_name' => $validated['name'],
            'mobile_number' => preg_replace('/\D+/', '', $validated['phone']),
            'email' => $validated['email'] ?? null,
            'speciality' => $validated['speciality'] ?? null,
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
