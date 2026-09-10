@extends('layouts.site')
@section('title', 'OPD Schedule')
@section('heading', 'OPD Schedule')
@section('intro', 'Find the right clinic, then call to confirm your specialist’s availability before travelling.')
@section('content')
<section class="inner-section"><div class="wrap">
    <div class="schedule-toolbar"><div><label for="schedule-search">Find a doctor or speciality</label><input id="schedule-search" type="search" placeholder="Search OPD schedule..."></div><a class="btn btn-primary" href="{{ route('home', ['book' => 1]) }}">Request Appointment</a></div>
    <div class="schedule-summary"><div><span>OPD hours</span><strong>Monday–Saturday · 10:00 AM–3:00 PM</strong></div><div><span>Emergency care</span><strong>24/7 for Orthopaedics &amp; Obs-Gynae</strong></div><a href="tel:+911662245450">Call 01662-245450 <span aria-hidden="true">→</span></a></div>
    <div class="table-card"><table class="schedule-table"><thead><tr><th>Speciality</th><th>Consultant</th><th>Days</th><th>Published hours</th><th></th></tr></thead><tbody>
@foreach([
    ['Orthopaedics & Joint Replacement', 'Dr. Amit Bhutani', 'Monday–Saturday', '10:00 AM–3:00 PM'],
    ['Obstetrics, Gynaecology & Infertility', 'Dr. Puja Bhutani', 'Monday–Saturday', '10:00 AM–3:00 PM'],
    ['Anaesthesia, Intensive Care & ICU', 'Dr. Deepak Gupta & Dr. Gunjan Gupta', 'Monday–Saturday', '10:00 AM–3:00 PM'],
    ['Physiotherapy & Sports Injury', 'Dr. Sachin Thakral', 'Monday–Saturday', '10:00 AM–3:00 PM'],
] as $row)
<tr data-schedule-row><td data-label="Speciality"><strong>{{ $row[0] }}</strong></td><td data-label="Consultant">{{ $row[1] }}</td><td data-label="Days">{{ $row[2] }}</td><td data-label="Hours">{{ $row[3] }}</td><td><a href="{{ route('home', ['book' => 1]) }}">Book <span aria-hidden="true">→</span></a></td></tr>
@endforeach
</tbody></table><p class="schedule-empty" hidden>No matching clinic found.</p></div>
    <p class="page-note">The hospital publishes these common OPD hours. Individual consultation availability can vary due to surgery, emergencies, and holidays. Please call before your visit.</p>
</div></section>
@push('scripts')<script>const scheduleSearch=document.querySelector('#schedule-search');scheduleSearch?.addEventListener('input',()=>{let visible=0;document.querySelectorAll('[data-schedule-row]').forEach(row=>{const show=row.textContent.toLowerCase().includes(scheduleSearch.value.toLowerCase().trim());row.hidden=!show;if(show){visible++}});document.querySelector('.schedule-empty').hidden=visible!==0});</script>@endpush
@endsection

