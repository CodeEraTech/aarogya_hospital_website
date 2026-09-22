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

            {{-- Share Section --}}
            <div class="sidebar-box share-box">
                <h3>Share This Service</h3>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" class="share-btn share-facebook" aria-label="Share on Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($service->name) }}" target="_blank" rel="noopener" class="share-btn share-twitter" aria-label="Share on Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($service->name) }}" target="_blank" rel="noopener" class="share-btn share-linkedin" aria-label="Share on LinkedIn"><i class="fa fa-linkedin"></i></a>
                    <a href="https://wa.me/?text={{ urlencode($service->name . ' - ' . url()->current()) }}" target="_blank" rel="noopener" class="share-btn share-whatsapp" aria-label="Share on WhatsApp"><i class="fa fa-whatsapp"></i></a>
                </div>
            </div>
        </aside>
    </div>
</section>
@endsection
