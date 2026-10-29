<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $siteSettings['seo_meta_title'] ?? 'Aarogya Hospital')</title>
    <meta name="description" content="@yield('description', $siteSettings['seo_meta_description'] ?? 'Patient information and services at Aarogya Hospital, Hisar.')">
    @hasSection('keywords')
    <meta name="keywords" content="@yield('keywords')">@endif
    <link rel="icon" href="{{ asset($siteSettings['website_favicon'] ?? 'favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/hospital/css/site.css') }}?v={{ filemtime(public_path('assets/hospital/css/site.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <a class="skip-link" href="#main">Skip to main content</a>
    @include('partials.site-header')

    <main id="main">
        @hasSection('heading')
        <section class="inner-hero">
            <div class="wrap">
                <div><span class="eyebrow">PATIENT RESOURCES</span>
                    <h1>@yield('heading')</h1>
                    <p>@yield('intro')</p>
                </div>
                <nav aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span>›</span><b>@yield('heading')</b></nav>
            </div>
        </section>
        @endif
        @yield('content')
    </main>

    @include('partials.site-footer')
    <nav class="mobile-cta" aria-label="Quick actions">
        @php($callNumbers = \App\Support\PhoneNumbers::parse($siteSettings['site_phone'] ?? null))
        @if(count($callNumbers) > 1)
        <details class="mobile-phone-menu" data-phone-menu>
            <summary><i class="fa fa-phone" aria-hidden="true"></i><span>Call</span></summary>
            <div class="mobile-phone-options">
                <strong>Call the hospital</strong>
                <x-phone-links :value="$siteSettings['site_phone']" />
            </div>
        </details>
        @elseif(count($callNumbers) === 1)
        <a href="{{ $callNumbers[0]['href'] }}" aria-label="Call {{ $callNumbers[0]['label'] }}"><i class="fa fa-phone" aria-hidden="true"></i><span>Call</span></a>
        @else
        <a href="{{ route('contact') }}"><i class="fa fa-envelope" aria-hidden="true"></i><span>Contact</span></a>
        @endif
        <a href="whatsapp://send?phone={{ preg_replace('/\D+/', '', $siteSettings['whatsapp_number']) }}"><i class="fa fa-phone" aria-hidden="true"></i><span>Helpline</span></a>
        <a href="{{ route('appointment.create') }}"><i class="fa fa-calendar" aria-hidden="true"></i><span>Appointment</span></a>
    </nav>
    <script src="{{ asset('assets/hospital/js/site.js') }}?v={{ filemtime(public_path('assets/hospital/js/site.js')) }}" defer></script>
    @stack('scripts')
    <script>
        window.EMPANELLED_SECTIONS = @json(config('empanelled'));
    </script>
</body>

</html>
