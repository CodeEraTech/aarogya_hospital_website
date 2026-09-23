@extends('layouts.site')
@section('title', 'Robotic Surgery | Aarogya Hospital')
@section('heading', 'Robotic Surgery')
@section('intro', 'Advanced robotic-assisted knee replacement surgery with VELYS™ technology for precision and faster recovery.')
@section('content')
<section class="inner-section robotic-surgery-page">
    <div class="wrap">
        {{-- Introduction Section --}}
        <div class="robotic-intro-section">
            <span class="eyebrow">ROBOTIC SURGERY</span>
            <div class="robotic-intro-content">{!! $robotic['robotic_intro_content'] ?? '<h2>Robotic Knee Surgery: A Revolution in Precision and Recovery</h2><p>This also sets it far important part in our ability to expedite a balanced level, specific and special for certain structures, and last it here. You will have a good standing for the life span of the leg. This is really the most important, the most important of its type, its state.</p>' !!}</div>
        </div>

        {{-- Advantages Section --}}
        @if(isset($robotic['robotic_advantages_content']) && $robotic['robotic_advantages_content'])
        <div class="robotic-advantages-section">
            <h3>Advantages of Robotic Knee Replacement Surgery</h3>
            <div class="robotic-advantages-content">{!! $robotic['robotic_advantages_content'] !!}</div>
        </div>
        @endif

        {{-- Three Images Section --}}
        @if((isset($robotic['robotic_image_1']) && $robotic['robotic_image_1']) || (isset($robotic['robotic_image_2']) && $robotic['robotic_image_2']) || (isset($robotic['robotic_image_3']) && $robotic['robotic_image_3']))
        <div class="robotic-images-section">
            @if(isset($robotic['robotic_image_1']) && $robotic['robotic_image_1'] && is_file(public_path($robotic['robotic_image_1'])))
            <div class="robotic-image-card">
                <img src="{{ asset($robotic['robotic_image_1']) }}" alt="Robotic Surgery" loading="lazy">
            </div>
            @endif
            @if(isset($robotic['robotic_image_2']) && $robotic['robotic_image_2'] && is_file(public_path($robotic['robotic_image_2'])))
            <div class="robotic-image-card">
                <img src="{{ asset($robotic['robotic_image_2']) }}" alt="Robotic Surgery" loading="lazy">
            </div>
            @endif
            @if(isset($robotic['robotic_image_3']) && $robotic['robotic_image_3'] && is_file(public_path($robotic['robotic_image_3'])))
            <div class="robotic-image-card">
                <img src="{{ asset($robotic['robotic_image_3']) }}" alt="Robotic Surgery" loading="lazy">
            </div>
            @endif
        </div>
        @endif

        {{-- VELYS Technology Section --}}
        @if(isset($robotic['robotic_velys_content']) || isset($robotic['robotic_velys_image']))
        <div class="robotic-velys-section">
            @if(isset($robotic['robotic_velys_image']) && $robotic['robotic_velys_image'] && is_file(public_path($robotic['robotic_velys_image'])))
            <div class="robotic-velys-image">
                <img src="{{ asset($robotic['robotic_velys_image']) }}" alt="VELYS Robotic System" loading="lazy">
            </div>
            @endif
            <div class="robotic-velys-content">
                <span class="eyebrow">VELYS ROBOTICS</span>
                {!! $robotic['robotic_velys_content'] ?? '<h3>Designed for Digital Precision in Knee Replacement Surgery</h3>' !!}
            </div>
        </div>
        @endif

        {{-- How It Works Section --}}
        @if(isset($robotic['robotic_how_it_works_content']) || isset($robotic['robotic_how_it_works_image']))
        <div class="robotic-how-works-section">
            @if(isset($robotic['robotic_how_it_works_image']) && $robotic['robotic_how_it_works_image'] && is_file(public_path($robotic['robotic_how_it_works_image'])))
            <div class="robotic-how-works-image">
                <img src="{{ asset($robotic['robotic_how_it_works_image']) }}" alt="How VELYS Works" loading="lazy">
            </div>
            @endif
            <div class="robotic-how-works-content">
                {!! $robotic['robotic_how_it_works_content'] ?? '<h3>How does the VELYS Robotic-Assisted Solution work?</h3>' !!}
            </div>
        </div>
        @endif

        {{-- Benefits and Comparison Section --}}
        @if(isset($robotic['robotic_benefits_content']) || isset($robotic['robotic_comparison_content']))
        <div class="robotic-bottom-section">
            @if(isset($robotic['robotic_benefits_content']) && $robotic['robotic_benefits_content'])
            <div class="robotic-info-box">
                {!! $robotic['robotic_benefits_content'] !!}
            </div>
            @endif
            @if(isset($robotic['robotic_comparison_content']) && $robotic['robotic_comparison_content'])
            <div class="robotic-info-box">
                {!! $robotic['robotic_comparison_content'] !!}
            </div>
            @endif
        </div>
        @endif
    </div>
</section>
@endsection
