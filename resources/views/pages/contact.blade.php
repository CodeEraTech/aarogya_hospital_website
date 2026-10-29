@extends('layouts.site')

@section('title', 'Contact Aarogya Hospital')
@section('heading', 'Contact Aarogya Hospital')
@section('intro', 'Reach our care team for appointments, directions, and patient support.')

@section('content')
@php
    // These keys exactly match the shared footer values from the Settings table.
    $phone = $siteSettings['site_phone'] ?? null;
    $email = $siteSettings['site_email'] ?? null;
    $address = $siteSettings['address'] ?? null;
@endphp
<section class="inner-section">
    <div class="wrap contact-page-grid">
        <div class="contact-page-copy">
            <div class="eyebrow">WE ARE HERE TO HELP</div>
            <h2>Care, closer to home.</h2>
            <p>Our team can help you find the right service, doctor, and appointment time.</p>
            <div class="contact-details">
                @if(\App\Support\PhoneNumbers::parse($phone))
                <div class="contact-phone-card">
                    <strong>Call us</strong>
                    <x-phone-links :value="$phone" />
                    <span>24/7 emergency and hospital line</span>
                </div>
                @endif
                @if(!empty($siteSettings['site_email']))<a href="mailto:{{ $siteSettings['site_email'] }}"><strong>{{ $siteSettings['site_email'] }}</strong><span>Email our care team</span></a>@endif
                @if(!empty($siteSettings['address']))<div><strong>Visit us</strong><span>{{ $siteSettings['address'] }}</span></div>@endif
            </div>
        </div>
        @php($mapSource = 'https://www.google.com/maps?q='.rawurlencode(trim('Aarogya Hospital, '.$address, ', ')).'&z=17&output=embed')
        @if(!empty($siteSettings['address']))
        <div class="contact-map">
            <iframe src="{{ $mapSource }}" title="Aarogya Hospital location map" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endif
    </div>
</section>
@endsection
