@extends('layouts.site')
@section('title', 'OPD Schedule')
@section('heading', 'OPD Schedule')
@section('intro', 'Find the right clinic, then call to confirm your doctor’s availability before travelling.')
@section('content')
<section class="inner-section"><div class="wrap">
    <div class="schedule-toolbar"><div><label for="schedule-search">Find a doctor or service</label><input id="schedule-search" type="search" placeholder="Search OPD schedule..."></div><a class="btn btn-primary" href="{{ route('home', ['book' => 1]) }}">Request Appointment</a></div>
    <div class="schedule-summary"><div><span>OPD hours</span><strong>Doctor-wise consultation timings</strong></div><div><span>Emergency care</span><strong>24/7 for Orthopaedics &amp; Obs-Gynae</strong></div><a href="tel:+911662245450">Call 01662-245450 <span aria-hidden="true">→</span></a></div>
    <div class="table-card"><table class="schedule-table"><thead><tr><th>Doctor</th><th>Service</th><th>Days</th><th>Published hours</th><th></th></tr></thead><tbody>
    @forelse($schedules as $schedule)<tr data-schedule-row><td data-label="Doctor"><strong>{{ $schedule->doctor->name }}</strong></td><td data-label="Service">{{ $schedule->doctor->speciality ?: '—' }}</td><td data-label="Days">{{ $schedule->days_label }}</td><td data-label="Hours">{{ Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} – {{ Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td><td><a href="{{ route('home', ['book' => 1]) }}">Book <span aria-hidden="true">→</span></a></td></tr>@empty<tr><td colspan="5" class="schedule-empty">No OPD schedules are currently available.</td></tr>@endforelse
    </tbody></table><p class="schedule-empty" data-empty-search hidden>No matching doctor found.</p></div>
    <p class="page-note">Timings may change due to surgeries, emergencies, or holidays. Please call before your visit.</p>
</div></section>
@push('scripts')<script>const scheduleSearch=document.querySelector('#schedule-search');scheduleSearch?.addEventListener('input',()=>{let visible=0;document.querySelectorAll('[data-schedule-row]').forEach(row=>{const show=row.textContent.toLowerCase().includes(scheduleSearch.value.toLowerCase().trim());row.hidden=!show;if(show)visible++});const empty=document.querySelector('[data-empty-search]');if(empty)empty.hidden=visible!==0});</script>@endpush
@endsection
