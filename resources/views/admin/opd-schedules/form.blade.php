@extends('layouts.admin')
@section('title', $schedule ? 'Edit OPD schedule' : 'Add OPD schedule')
@section('heading', $schedule ? 'Edit OPD schedule' : 'Add OPD schedule')
@section('content')
<div class="form-page">
    <a class="back-link" href="{{ route('admin.opd-schedules.index') }}">&larr; Back to OPD schedules</a>
    <section class="panel form-panel">
        <form method="post" action="{{ $schedule ? route('admin.opd-schedules.update', $schedule) : route('admin.opd-schedules.store') }}">
            @csrf
            @if($schedule) @method('PUT') @endif
            <div class="form-grid">
                <label class="wide"><span>Doctor <b class="required">*</b></span><select name="doctor_id" required><option value="">Select doctor</option>@foreach($doctors as $doctor)<option value="{{ $doctor->id }}" @selected((string) old('doctor_id', $schedule?->doctor_id) === (string) $doctor->id)>{{ $doctor->name }}{{ $doctor->speciality ? ' — '.$doctor->speciality : '' }}</option>@endforeach</select></label>
                <div class="wide form-field"><span>Consultation days <b class="required">*</b></span><div class="day-picker">@foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)<label><input type="checkbox" name="days[]" value="{{ $day }}" @checked(in_array($day, old('days', $schedule?->days ?? [])))><span>{{ substr($day, 0, 3) }}</span></label>@endforeach</div></div>
                <label><span>Start time <b class="required">*</b></span><input type="time" name="start_time" value="{{ old('start_time', $schedule?->start_time ? substr($schedule->start_time, 0, 5) : '') }}" required></label>
                <label><span>End time <b class="required">*</b></span><input type="time" name="end_time" value="{{ old('end_time', $schedule?->end_time ? substr($schedule->end_time, 0, 5) : '') }}" required></label>
                <label><span>Status <b class="required">*</b></span><select name="status"><option value="Active" @selected(old('status', $schedule?->status ?? 'Active') === 'Active')>Active</option><option value="Inactive" @selected(old('status', $schedule?->status) === 'Inactive')>Inactive</option></select></label>
                <label><span>Sort order</span><input type="number" name="sort_order" min="0" value="{{ old('sort_order', $schedule?->sort_order ?? 0) }}"></label>
            </div>
            <div class="form-actions"><button class="button button-primary">{{ $schedule ? 'Update' : 'Save' }} schedule</button></div>
        </form>
    </section>
</div>
@endsection
