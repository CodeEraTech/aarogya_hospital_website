<footer class="footer" id="contact">
    <div class="wrap footer-grid footer-grid-modern">
        <div class="footer-brand"><a class="logo footer-logo" href="{{ route('home') }}"><img class="footer-logo-image" src="{{ asset($siteSettings['website_logo'] ?? 'assets/hospital/images/aarogya-logo.png') }}" alt="Dr. Bhutani’s Aarogya Hospital"></a>
            <p>{{ $siteSettings['footer_about'] ?? 'Advanced orthopaedic, trauma and fertility care with modern technology and a human touch.' }}</p>
            <p style="color: #087C60;"><strong>OPD HOURS: {{ $siteSettings['stat_opd_hours'] ?? 'Monday - Saturday: 10:00 AM - 03:00 PM' }}</strong></p>
        </div>
        <div>
            <h3>Quick Links</h3>
            <a href="{{ route('blogs.index') }}">Blogs</a>
            <a href="{{ route('doctors.index') }}">Doctors</a>
            <a href="{{ route('testimonials') }}">Testimonials</a>
            <a href="{{ route('gallery') }}">Gallery</a>
            <a href="{{ route('services.index') }}">Services</a>
        </div>
        <!-- <div>
            <h3>Other Links</h3>
            <a href="{{ route('feedback.create') }}">Feedback</a>
            <a href="{{ route('appointment.create') }}">Book Appointment</a>
            <a href="{{ route('empanelled-corporate', ['slug' => 'tpas']) }}">TPA's</a>
            <a href="{{ route('empanelled-corporate', ['slug' => 'government-departments']) }}">Government Departments</a>
            <a href="{{ route('contact') }}">Contact Us</a>
            @foreach($footerPages ?? [] as $page)<a href="{{ url('/pages/'.$page->slug) }}">{{ $page->title }}</a>@endforeach
        </div> -->
        <div>
            <h3>Contact</h3>
            @if(!empty($siteSettings['site_phone']))
            <a style="color: #087C60; font-weight: bold; font-size: 18px;" href="tel:{{ preg_replace('/\D+/', '', $siteSettings['site_phone']) }}">{{ $siteSettings['site_phone'] }}</a>
            @endif
            @if(!empty($siteSettings['site_email']))
            <a style="color: #087C60; font-weight: bold; font-size: 18px;" href="mailto:{{ $siteSettings['site_email'] }}">{{ $siteSettings['site_email'] }}</a>
            @endif
            @if(!empty($siteSettings['address']))
            <span style="color: #087C60; font-weight: bold; font-size: 18px;">{{ $siteSettings['address'] }}</span>
            @endif
            <div class="footer-socials">
                @foreach($socialKeys ?? [] as $key => $icon)
                @if(!empty(($siteSettings['social_'.$key] ?? null)))
                <a class="social-link social-{{ $key }}" href="{{ $siteSettings['social_'.$key] }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($key) }}"><i class="fa {{ $icon }}" aria-hidden="true"></i></a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="wrap footer-bottom footer-bottom-modern"><span>© {{ now()->year }} Aarogya Hospital. All rights reserved.</span></div>
</footer>