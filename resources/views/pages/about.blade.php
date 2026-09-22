@extends('layouts.site')
@section('title', 'About Aarogya Hospital')
@section('heading', 'About Us')
@section('intro', 'Learn about our hospital, leadership, and commitment to excellence in healthcare.')
@section('content')
<section class="inner-section">
    <div class="wrap">
        {{-- About Section --}}
        <div class="about-section">
            @if(isset($about['about_image']) && $about['about_image'])
            <div class="about-image">
                <img src="{{ asset($about['about_image']) }}" alt="About Aarogya Hospital">
            </div>
            @endif
            <div class="about-text">
                <span class="eyebrow">WHO WE ARE</span>
                <h2>About Aarogya Hospital</h2>
                <div class="about-content">{!! $about['about_content'] ?? '<p>Aarogya Hospital brings advanced orthopaedic, robotic joint replacement, obstetrics-gynaecology and infertility care to Hisar.</p>' !!}</div>
            </div>
        </div>

        {{-- Chairman Message --}}
        @if(isset($about['chairman_message']) || isset($about['chairman_image']))
        <div class="chairman-section">
            <div class="chairman-text">
                <span class="eyebrow">LEADERSHIP</span>
                <h2>Chairman's Message</h2>
                <div class="chairman-content">{!! $about['chairman_message'] ?? '<p>Welcome to Aarogya Hospital...</p>' !!}</div>
            </div>
            @if(isset($about['chairman_image']) && $about['chairman_image'])
            <div class="chairman-image">
                <img src="{{ asset($about['chairman_image']) }}" alt="Chairman">
            </div>
            @endif
        </div>
        @endif

        {{-- Why Choose Us --}}
        <div class="why-choose-section">
            <div class="section-header">
                <span class="eyebrow">OUR STRENGTHS</span>
                <h2>Why Choose Us</h2>
            </div>
            <div class="why-choose-grid">
                @for($i = 1; $i <= 6; $i++)
                @if(isset($about['why_choose_' . $i . '_title']) && $about['why_choose_' . $i . '_title'])
                <div class="why-box why-box-{{ $i }}">
                    <div class="why-box-number" aria-hidden="true"><svg viewBox="0 0 40 40" focusable="false"><circle cx="20" cy="20" r="18"></circle></svg><span>{{ $i }}</span></div>
                    <h3>{{ $about['why_choose_' . $i . '_title'] }}</h3>
                    <p>{{ $about['why_choose_' . $i . '_content'] ?? '' }}</p>
                </div>
                @endif
                @endfor
            </div>
        </div>

        {{-- Mission, Vision, Quality Policy --}}
        <div class="values-section">
            @if(isset($about['our_mission']) && $about['our_mission'])
            <div class="value-box value-mission">
                <div class="value-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M12 3 19 6v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3Z"></path></svg></div>
                <span class="eyebrow">OUR MISSION</span>
                <div class="value-content">{!! $about['our_mission'] !!}</div>
            </div>
            @endif
            @if(isset($about['our_vision']) && $about['our_vision'])
            <div class="value-box value-vision">
                <div class="value-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M3 12s3.2-5 9-5 9 5 9 5-3.2 5-9 5-9-5-9-5Z"></path><circle cx="12" cy="12" r="2.5"></circle><path d="M19 4v4m-2-2h4"></path></svg></div>
                <span class="eyebrow">OUR VISION</span>
                <div class="value-content">{!! $about['our_vision'] !!}</div>
            </div>
            @endif
            @if(isset($about['quality_policy']) && $about['quality_policy'])
            <div class="value-box value-quality">
                <div class="value-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M20.8 8.8c0 5.2-8.8 10-8.8 10s-8.8-4.8-8.8-10A4.8 4.8 0 0 1 12 6.2a4.8 4.8 0 0 1 8.8 2.6Z"></path><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg></div>
                <span class="eyebrow">QUALITY POLICY</span>
                <div class="value-content">{!! $about['quality_policy'] !!}</div>
            </div>
            @endif
        </div>

        {{-- Certificates Section --}}
        @if(isset($about['certificates']) && $about['certificates'])
            @php($certificates = json_decode($about['certificates'], true))
            @if(is_array($certificates) && count($certificates) > 0)
            <div class="certificates-section">
                <div class="section-header">
                    <span class="eyebrow">ACCREDITATIONS</span>
                    <h2>Our Certificates & Awards</h2>
                </div>
                <div class="certificates-display">
                    @foreach($certificates as $cert)
                    @if(is_file(public_path($cert)))
                    <div class="certificate-card">
                        <img src="{{ asset($cert) }}" alt="Certificate" loading="lazy">
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        @endif
    </div>
</section>
@endsection
