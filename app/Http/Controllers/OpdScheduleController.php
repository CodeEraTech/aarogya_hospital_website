<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\OpdSchedule;
use Illuminate\Http\Request;

class OpdScheduleController extends Controller
{
    private array $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    public function index()
    {
        $schedules = OpdSchedule::with('doctor')->orderBy('sort_order')->orderBy('start_time')->paginate(15);
        return view('admin.opd-schedules.index', compact('schedules'));
    }

    public function publicIndex()
    {
        $schedules = OpdSchedule::with('doctor')->where('status', 'Active')->orderBy('sort_order')->orderBy('start_time')->get();
        return view('pages.opd-schedule', compact('schedules'));
    }

    public function create()
    {
        return view('admin.opd-schedules.form', ['schedule' => null, 'doctors' => $this->doctors()]);
    }

    public function store(Request $request)
    {
        OpdSchedule::create($this->validated($request));
        return redirect()->route('admin.opd-schedules.index')->with('success', 'OPD schedule added successfully.');
    }

    public function edit(OpdSchedule $opdSchedule)
    {
        return view('admin.opd-schedules.form', ['schedule' => $opdSchedule, 'doctors' => $this->doctors()]);
    }

    public function update(Request $request, OpdSchedule $opdSchedule)
    {
        $opdSchedule->update($this->validated($request));
        return redirect()->route('admin.opd-schedules.index')->with('success', 'OPD schedule updated successfully.');
    }

    public function destroy(OpdSchedule $opdSchedule)
    {
        $opdSchedule->delete();
        return back()->with('success', 'OPD schedule deleted successfully.');
    }

    private function doctors()
    {
        return Doctor::where('status', 'Active')->orderBy('name')->get();
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'days' => 'required|array|min:1',
            'days.*' => 'required|in:'.implode(',', $this->days),
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required|in:Active,Inactive',
            'sort_order' => 'nullable|integer|min:0|max:9999',
        ]);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        return $data;
    }
}
