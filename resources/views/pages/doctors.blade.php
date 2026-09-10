@extends('layouts.site')
@section('title', 'Our Doctors')
@section('heading', 'Doctors Who Listen. Experts Who Care.')
@section('intro', 'Meet experienced specialists focused on clear guidance, thoughtful treatment and better outcomes.')
@section('content')
<section class="inner-section"><div class="wrap"><div class="filter-bar" role="group" aria-label="Filter doctors"><button class="active" data-doctor-filter="all">All Doctors</button><button data-doctor-filter="orthopaedics">Orthopaedics</button><button data-doctor-filter="fertility">Gynaecology &amp; Infertility</button><button data-doctor-filter="critical-care">Critical Care</button><button data-doctor-filter="physiotherapy">Physiotherapy</button></div><div class="doctor-directory">
@foreach([['Dr. Amit Bhutani','Orthopaedics & Joint Replacement Specialist','orthopaedics','dr-amit-bhutani.jpg'],['Dr. Puja Bhutani','Obstetrics, Gynaecology & Infertility Specialist','fertility','dr-puja-bhutani.jpg'],['Dr. Deepak Gupta & Dr. Gunjan Gupta','Anaesthesia, Intensive Care & ICU','critical-care','dr-deepak-gunjan-gupta.jpg'],['Dr. Sachin Thakral','Physiotherapy & Sports Injury Specialist','physiotherapy','dr-sachin-thakral.jpg']] as $doctor)
<article class="directory-card" data-doctor-card="{{ $doctor[2] }}">
    <div class="directory-photo"><img src="{{ asset('assets/hospital/images/'.$doctor[3]) }}" alt="{{ $doctor[0] }}" width="684" height="1024" loading="lazy"></div>
    <div><h2>{{ $doctor[0] }}</h2><p>{{ $doctor[1] }}</p><div class="doctor-meta"><span>Aarogya Hospital, Hisar</span></div><a class="btn btn-outline" href="{{ route('home', ['book' => 1]) }}">Book Consultation</a></div>
</article>
@endforeach
</div></div></section>
@push('scripts')<script>document.querySelectorAll('[data-doctor-filter]').forEach(button=>button.addEventListener('click',()=>{document.querySelectorAll('[data-doctor-filter]').forEach(item=>item.classList.remove('active'));button.classList.add('active');document.querySelectorAll('[data-doctor-card]').forEach(card=>card.hidden=button.dataset.doctorFilter!=='all'&&card.dataset.doctorCard!==button.dataset.doctorFilter)}));</script>@endpush
@endsection
