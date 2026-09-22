@extends('layouts.site')

@section('title', $service->name.' | Aarogya Hospital')
@section('description', $service->meta_description ?: ($service->description ?: 'Learn more about '.$service->name.' at Aarogya Hospital.'))
@section('keywords', $service->meta_tags ?: $service->name)
@section('heading', $service->name)
@section('intro', $service->description)

@section('content')
<section class="inner-section">
    <div class="wrap detail-layout">
        <div class="detail-main">
            @if($service->content)
                <div class="detail-content">{!! $service->content !!}</div>
            @else
                <p class="empty-state">More information about this service will be available soon.</p>
            @endif
        </div>

        <aside class="detail-sidebar">
            {{-- Related Services --}}
            @if($relatedServices->count() > 0)
            <div class="sidebar-box">
                <h3>Related Services</h3>
                <div class="related-list">
                    @foreach($relatedServices as $related)
                    <a href="{{ route('services.show', $related->slug) }}" class="related-item">
                        @if($related->image)
                        <img src="{{ asset($related->image) }}" alt="{{ $related->name }}">
                        @endif
                        <div>
                            <h4>{{ $related->name }}</h4>
                            <p>{{ Str::limit($related->description, 60) }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- CTA Box --}}
            <aside class="priority">
                <h2>Your Health<br>Our Priority</h2>
                <p>Arrange a consultation with our specialist team.</p>
                <button class="btn btn-light" type="button" data-open-appointment>Book an Appointment <span>→</span></button>
            </aside>
        </aside>
    </div>
</section>
@endsection
