<div class="utility">
    <div class="wrap utility-inner">
        <span>
            @php($socialKeys = ['facebook' => 'fa-facebook', 'instagram' => 'fa-instagram', 'linkedin' => 'fa-linkedin', 'youtube' => 'fa-youtube', 'whatsapp' => 'fa-whatsapp'])
            @php($socialValues = ['facebook' => $siteSettings['social_facebook'] ?? null, 'instagram' => $siteSettings['social_instagram'] ?? null, 'linkedin' => $siteSettings['social_linkedin'] ?? null, 'youtube' => $siteSettings['social_youtube'] ?? null, 'whatsapp' => $siteSettings['social_whatsapp'] ?? null])
            @if(collect($socialValues)->filter()->isNotEmpty())
            <span class="social-links" aria-label="Social media links">
                @foreach($socialKeys as $key => $icon)
                @if(!empty($socialValues[$key]))<a class="social-link social-{{ $key }}" href="{{ $socialValues[$key] }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($key) }}"><i class="fa {{ $icon }}" aria-hidden="true"></i></a>@endif
                @endforeach
            </span>
            @endif
        </span>
        <nav aria-label="Utility">
            @foreach(array_filter([
            ['label' => 'OPD Schedule', 'url' => route('opd-schedule')],
            ['label' => 'Feedback', 'url' => route('feedback.create')],
            ['label' => 'Contact', 'url' => route('contact')],
            ], fn ($item) => !empty($item['url'])) as $item)
            <a class="utility-action" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
            @endforeach
        </nav>
    </div>
</div>
<header class="site-header">
    <div class="wrap nav-row">
        <a class="logo" href="{{ route('home') }}" aria-label="Aarogya Hospital home"><img class="hospital-logo" src="{{ asset($siteSettings['website_logo'] ?? 'assets/hospital/images/aarogya-logo.png') }}" alt="Dr. Bhutani’s Aarogya Hospital" width="597" height="250"></a>
        <button class="menu-btn" type="button" aria-expanded="false" aria-controls="main-nav"><span></span><span></span><span></span><b class="sr-only">Open menu</b></button>
        <nav class="main-nav" id="main-nav" aria-label="Main navigation">
            <a href="{{ route('home') }}" @class(['active'=> request()->routeIs('home')])>Home</a>
            <a href="{{ route('about') }}" @class(['active'=> request()->routeIs('about')])>About</a>
            <a href="{{ route('services.index') }}" @class(['active'=> request()->routeIs('services.*')])>Services</a>
            <a href="{{ route('doctors.index') }}" @class(['active'=> request()->routeIs('doctors.*')])>Doctors</a>
            <a href="{{ route('testimonials') }}" @class(['active'=> request()->routeIs('testimonials')])>Testimonials</a>
            <a href="{{ route('blogs.index') }}" @class(['active'=> request()->routeIs('blogs.*')])>Blogs</a>
            <a href="{{ route('gallery') }}" @class(['active'=> request()->routeIs('gallery')])>Gallery</a>
            <details class="nav-dropdown @if(request()->routeIs('empanelled-corporate')) active @endif">
                <summary class="nav-dropdown-toggle">Empanelled Corporate <span class="nav-chevron" aria-hidden="true"></span></summary>
                <div class="nav-dropdown-menu">@foreach(config('empanelled') as $item)<a href="{{ route('empanelled-corporate', ['slug' => $item['slug']]) }}">{{ $item['name'] }}</a>@endforeach</div>
            </details>
            <a href="{{ route('contact') }}" @class(['active'=> request()->routeIs('contact')])>Contact</a>
        </nav>
        <a class="btn btn-primary header-cta" href="{{ route('appointment.create') }}" aria-label="Book Appointment">Book Appointment <svg class="inline-icon" viewBox="0 0 20 20" aria-hidden="true" focusable="false"><path d="M4 10h11M10 5l5 5-5 5"/></svg></a>
        <span class="header-accreditation"><img src="{{ asset('assets/hospital/images/nabh-accredited.png') }}" alt="NABH Accredited" width="768" height="768"></span>
    </div>
</header>
