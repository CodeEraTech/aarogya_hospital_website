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
                <img src="{{ asset('storage/' . $about['about_image']) }}" alt="About Aarogya Hospital">
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
            @if(isset($about['chairman_image']) && $about['chairman_image'])
            <div class="chairman-image">
                <img src="{{ asset('storage/' . $about['chairman_image']) }}" alt="Chairman">
            </div>
            @endif
            <div class="chairman-text">
                <span class="eyebrow">LEADERSHIP</span>
                <h2>Chairman's Message</h2>
                <div class="chairman-content">{!! $about['chairman_message'] ?? '<p>Welcome to Aarogya Hospital...</p>' !!}</div>
            </div>
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
                <div class="why-box">
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
            <div class="value-box">
                <span class="eyebrow">OUR MISSION</span>
                <div class="value-content">{!! $about['our_mission'] !!}</div>
            </div>
            @endif
            @if(isset($about['our_vision']) && $about['our_vision'])
            <div class="value-box">
                <span class="eyebrow">OUR VISION</span>
                <div class="value-content">{!! $about['our_vision'] !!}</div>
            </div>
            @endif
            @if(isset($about['quality_policy']) && $about['quality_policy'])
            <div class="value-box">
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
                    @if(is_file(public_path('storage/' . $cert)))
                    <div class="certificate-card">
                        <img src="{{ asset('storage/' . $cert) }}" alt="Certificate" loading="lazy">
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
