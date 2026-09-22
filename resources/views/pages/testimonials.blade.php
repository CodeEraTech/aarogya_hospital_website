@extends('layouts.site')

@section('title', 'Patient Testimonials | Aarogya Hospital')
@section('heading', 'Patient Stories')
@section('intro', 'Real experiences shared by patients and families cared for by our team.')

@section('content')
@php
    $videoTestimonials = $testimonials->filter(fn ($testimonial) => in_array($testimonial->type, ['File', 'Video Link'], true));
    $textTestimonials = $testimonials->filter(fn ($testimonial) => $testimonial->type === 'Text' || !in_array($testimonial->type, ['File', 'Video Link'], true));
@endphp

<section class="inner-section testimonials-page">
    @if($videoTestimonials->isNotEmpty())
        <div class="wrap testimonial-video-section">
            <div class="section-header"><span class="eyebrow">VIDEO TESTIMONIALS</span><h2>Patient stories in their own words</h2></div>
            <div class="testimonial-video-grid">
                @foreach($videoTestimonials as $testimonial)
                    @php($videoSource = $testimonial->type === 'File' && $testimonial->video_file ? asset($testimonial->video_file) : $testimonial->video_url)
                    @if($videoSource)
                        <div class="testimonial-video-item"><video controls playsinline preload="metadata" src="{{ $videoSource }}"></video></div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    @if($textTestimonials->isNotEmpty())
        <div class="wrap testimonial-text-section">
            <div class="section-header"><span class="eyebrow">TEXT TESTIMONIALS</span><h2>Trusted by our patients</h2></div>
            <div class="testimonial-text-grid">
                @foreach($textTestimonials as $testimonial)
                    @php
                        $nameParts = preg_split('/\s+/', trim($testimonial->name), -1, PREG_SPLIT_NO_EMPTY);
                        $initials = collect($nameParts)->take(2)->map(fn ($part) => strtoupper(substr($part, 0, 1)))->implode('');
                    @endphp
                    <article class="testimonial-text-card">
                        <div class="testimonial-card-mark" aria-hidden="true">“</div>
                        <blockquote>{{ $testimonial->quote }}</blockquote>
                        <footer><span class="testimonial-initials" aria-hidden="true">{{ $initials ?: 'P' }}</span><div><strong>{{ $testimonial->name }}</strong><span>Aarogya Hospital patient</span></div></footer>
                    </article>
                @endforeach
            </div>
        </div>
    @elseif($videoTestimonials->isEmpty())
        <div class="wrap empty-state"><h2>Patient stories coming soon</h2><p>Our team is preparing this information.</p></div>
    @endif
</section>
@endsection
