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
        @php
            $mapAddress = trim($siteSettings['address'] ?? 'Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001');
            if ($mapAddress === '') $mapAddress = 'Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001';
            $mapQuery = trim('Aarogya Hospital, '.$mapAddress, ', ');
            $mapSource = 'https://www.google.com/maps?q='.rawurlencode($mapQuery).'&z=17&output=embed';
        @endphp
        <div class="contact-map">
            <iframe src="{{ $mapSource }}" title="Aarogya Hospital location map" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</section>
@endsection
