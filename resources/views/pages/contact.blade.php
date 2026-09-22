@extends('layouts.site')

@section('title', 'Contact Aarogya Hospital')
@section('heading', 'Contact Aarogya Hospital')
@section('intro', 'Reach our care team for appointments, directions, and patient support.')

@section('content')
<section class="inner-section">
    <div class="wrap contact-page-grid">
        <div class="contact-page-copy">
            <div class="eyebrow">WE ARE HERE TO HELP</div>
            <h2>Care, closer to home.</h2>
            <p>Our team can help you find the right service, doctor, and appointment time.</p>
            <div class="contact-details">
                <a href="tel:+911662245450"><strong>01662-245450</strong><span>24×7 emergency and hospital line</span></a>
                <a href="mailto:care@aarogyahospital.com"><strong>care@aarogyahospital.com</strong><span>Email our care team</span></a>
                <div><strong>Visit us</strong><span>Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001</span></div>
            </div>
        </div>
        <div class="contact-page-card">
            <h2>Plan your visit</h2>
            <p>OPD hours are Monday–Saturday, 10:00 AM–3:00 PM. Please call before visiting to confirm availability.</p>
            <div class="contact-page-actions"><a class="btn btn-primary" href="{{ route('appointment.create') }}">Book an Appointment</a><a class="btn btn-outline" href="https://maps.google.com/?q=Aarogya+Hospital+Hisar" target="_blank" rel="noopener">Get Directions</a></div>
        </div>
    </div>
</section>
@endsection
