<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $siteSettings['seo_meta_title'] ?? 'Aarogya Hospital')</title>
    <meta name="description" content="@yield('description', $siteSettings['seo_meta_description'] ?? 'Patient information and services at Aarogya Hospital, Hisar.')">
    <link rel="icon" href="{{ asset($siteSettings['website_favicon'] ?? 'favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/hospital/css/site.css') }}">
</head>
<body>
<a class="skip-link" href="#main">Skip to main content</a>
<div class="utility"><div class="wrap utility-inner"><span>🏅 <b>10 YEARS OF EXCELLENCE</b><i></i> Advanced Orthopaedic, Trauma and Fertility Care</span><nav><a href="{{ route('emergency') }}">◉ 24×7 Emergency</a><a href="tel:+911662245450">☎ 01662-245450</a><a href="{{ route('home') }}#location">⌖ Location</a></nav></div></div>
<header class="site-header"><div class="wrap nav-row">
    <a class="logo" href="{{ route('home') }}"><img class="hospital-logo" src="{{ asset('assets/hospital/images/aarogya-logo.png') }}" alt="Dr. Bhutani’s Aarogya Hospital" width="597" height="250"></a>
    <button class="menu-btn" type="button" aria-expanded="false" aria-controls="main-nav"><span></span><span></span><span></span><b class="sr-only">Open menu</b></button>
    <nav class="main-nav" id="main-nav"><a href="{{ route('home') }}">Home</a><a href="{{ route('about') }}" @if(request()->routeIs('about')) class="active" aria-current="page" @endif>About</a><a href="{{ route('doctors.index') }}" @if(request()->routeIs('doctors.*')) class="active" aria-current="page" @endif>Doctors</a><a href="{{ route('opd-schedule') }}" @if(request()->routeIs('opd-schedule')) class="active" aria-current="page" @endif>OPD Schedule</a><a href="{{ route('gallery') }}" @if(request()->routeIs('gallery')) class="active" aria-current="page" @endif>Gallery</a><details class="nav-dropdown @if(request()->routeIs('empanelled-corporate')) active @endif"><summary class="nav-dropdown-toggle">Empanelled Corporate <span class="nav-chevron" aria-hidden="true"></span></summary><div class="nav-dropdown-menu">@foreach(config('empanelled') as $item)<a href="{{ route('empanelled-corporate', $item['slug']) }}">{{ $item['name'] }}</a>@endforeach</div></details><a href="{{ route('feedback.create') }}" @if(request()->routeIs('feedback.create')) class="active" aria-current="page" @endif>Feedback</a><a href="{{ route('home') }}#contact">Contact</a></nav>
    <a class="btn btn-primary header-cta" href="{{ route('home', ['book' => 1]) }}">Book Appointment <span>→</span></a>
    <span class="header-accreditation"><img src="{{ asset('assets/hospital/images/nabh-accredited.png') }}" alt="NABH Accredited" width="768" height="768"></span>
</div></header>
<main id="main">
    <section class="inner-hero"><div class="wrap"><div><span class="eyebrow">PATIENT RESOURCES</span><h1>@yield('heading')</h1><p>@yield('intro')</p></div><nav aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span>›</span><b>@yield('heading')</b></nav></div></section>
    @yield('content')
</main>
<footer class="footer"><div class="wrap footer-grid"><div><a class="logo footer-logo" href="{{ route('home') }}"><img class="hospital-logo" src="{{ asset('assets/hospital/images/aarogya-logo.png') }}" alt="Dr. Bhutani’s Aarogya Hospital" width="597" height="250"></a><p>Advanced healthcare with modern technology and a human touch.</p></div><div><h3>Explore</h3><a href="{{ route('doctors.index') }}">Our Doctors</a><a href="{{ route('opd-schedule') }}">OPD Schedule</a><a href="{{ route('gallery') }}">Gallery</a><a href="{{ route('empanelled-corporate', ['slug' => config('empanelled.1.slug')]) }}">Empanelled Corporate</a></div><div><h3>Patient Care</h3><a href="{{ route('home', ['book' => 1]) }}">Appointment</a><a href="{{ route('feedback.create') }}">Feedback</a><a href="{{ route('emergency') }}">Emergency</a></div><div><h3>Contact</h3><a href="tel:+911662245450">01662-245450</a><a href="tel:+918222049007">+91 82220 49007</a><a href="tel:+918222049008">+91 82220 49008</a><span>Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001</span></div></div><div class="wrap footer-bottom"><span>© {{ now()->year }} Aarogya Hospital</span><span>Privacy · Terms · Disclaimer</span></div></footer>
<nav class="mobile-cta"><a href="tel:+911662245450">☎<span>Call</span></a><a href="tel:+918222049007">☎<span>Helpline</span></a><a href="{{ route('home', ['book' => 1]) }}">▣<span>Appointment</span></a></nav>
<script src="{{ asset('assets/hospital/js/site.js') }}?v={{ filemtime(public_path('assets/hospital/js/site.js')) }}" defer></script>
@stack('scripts')
<script>window.EMPANELLED_SECTIONS=@json(config('empanelled'));</script>
</body></html>
