@extends('layouts.site')
@section('title', 'Our Doctors')
@section('heading', 'Doctors Who Listen. Experts Who Care.')
@section('intro', 'Meet experienced specialists focused on clear guidance, thoughtful treatment and better outcomes.')
@section('content')
<section class="inner-section"><div class="wrap"><div class="filter-bar" role="group" aria-label="Filter doctors"><button class="active" data-doctor-filter="all">All Doctors</button><button data-doctor-filter="orthopaedics">Orthopaedics</button><button data-doctor-filter="fertility">Gynaecology &amp; Infertility</button><button data-doctor-filter="critical-care">Critical Care</button><button data-doctor-filter="physiotherapy">Physiotherapy</button></div><div class="doctor-grid">
@foreach($doctors as $doctor)
@php($category = str_contains(strtolower($doctor->designation), 'fertility') || str_contains(strtolower($doctor->designation), 'gynaec') ? 'fertility' : (str_contains(strtolower($doctor->designation), 'anaesthesia') || str_contains(strtolower($doctor->designation), 'icu') ? 'critical-care' : (str_contains(strtolower($doctor->designation), 'physio') ? 'physiotherapy' : 'orthopaedics')))
<article class="doctor-card" data-doctor-card="{{ $category }}">
    <div class="doctor-photo"><img src="{{ $doctor->image ? asset($doctor->image) : asset('assets/hospital/images/doctor-placeholder.jpg') }}" alt="{{ $doctor->name }}" width="684" height="1024" loading="lazy"></div>
    <div><h3>{{ $doctor->name }}</h3>@if($doctor->designation)<p>{{ $doctor->designation }}</p>@endif @if($doctor->degree)<small>{{ $doctor->degree }}</small>@endif<a class="doctor-book" href="{{ route('doctors.show', $doctor->slug) }}">Know More <span aria-hidden="true">&rarr;</span></a></div>
</article>
@endforeach
</div></div></section>
@push('scripts')<script>document.querySelectorAll('[data-doctor-filter]').forEach(button=>button.addEventListener('click',()=>{document.querySelectorAll('[data-doctor-filter]').forEach(item=>item.classList.remove('active'));button.classList.add('active');document.querySelectorAll('[data-doctor-card]').forEach(card=>card.hidden=button.dataset.doctorFilter!=='all'&&card.dataset.doctorCard!==button.dataset.doctorFilter)}));</script>@endpush
@endsection
