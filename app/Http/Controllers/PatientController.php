<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query()->withCount('appointments');
        if ($request->filled('search')) $query->where(fn($q) => $q->where('patient_id', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->orWhere('phone', 'like', '%' . $request->search . '%'));
        return view('admin.patients.index', ['patients' => $query->latest()->paginate(10)->withQueryString()]);
    }

    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }
    
    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate(['name' => 'required|string|max:80', 'phone' => 'required|string|max:20', 'email' => 'nullable|email|max:120']);
        $data['phone'] = app(\App\Services\PatientService::class)->normalizePhone($data['phone']);
        if (Patient::where('phone', $data['phone'])->whereKeyNot($patient->id)->exists()) throw ValidationException::withMessages(['phone' => 'This phone number already belongs to another patient.']);
        $patient->update($data);
        return back()->with('success', 'Patient details updated successfully.');
    }
}
