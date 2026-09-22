@extends('layouts.site')

@section('title', 'Patient Testimonials | Aarogya Hospital')
@section('heading', 'Patient Stories')
@section('intro', 'Real experiences shared by patients and families cared for by our team.')

@section('content')
<section class="inner-section">
    <div class="wrap testimonial-directory">
        @forelse($testimonials as $testimonial)
            <article class="testimonial-card">
                <div class="testimonial-card-mark">“</div>
                @if($testimonial->type === 'File' && $testimonial->video_file)
                    <video controls preload="metadata" src="{{ asset($testimonial->video_file) }}"></video>
                @elseif($testimonial->type === 'Video Link' && $testimonial->video_url)
                    <a class="testimonial-video-link" href="{{ $testimonial->video_url }}" target="_blank" rel="noopener">Watch patient story <span aria-hidden="true">→</span></a>
                @endif
                <blockquote>{{ $testimonial->quote }}</blockquote>
                <footer><strong>{{ $testimonial->name }}</strong><span>Aarogya Hospital patient</span></footer>
            </article>
        @empty
            <div class="empty-state"><h2>Patient stories coming soon</h2><p>Our team is preparing this information.</p></div>
        @endforelse
    </div>
</section>
@endsection
