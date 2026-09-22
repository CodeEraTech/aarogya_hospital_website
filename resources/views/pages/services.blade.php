@extends('layouts.site')

@section('title', 'Services | Aarogya Hospital')
@section('heading', 'Our Services')
@section('intro', 'Specialist care tailored to every stage of your health journey.')

@section('content')
<section class="inner-section">
    <div class="wrap">
        <div class="speciality-grid service-directory-grid">
            @forelse($services as $service)
                <article class="speciality-card service-card">
                    @if($service->image)
                        <img class="service-card-image" src="{{ asset($service->image) }}" alt="{{ $service->name }}" loading="lazy">
                    @else
                        <div class="service-card-image-placeholder" aria-hidden="true"></div>
                    @endif
                    <div>
                        <h3><a href="{{ route('services.show', $service->slug) }}">{{ $service->name }}</a></h3>
                        <p>{{ $service->description ?: 'Explore this service at Aarogya Hospital.' }}</p>
                        <a class="service-card-link" href="{{ route('services.show', $service->slug) }}">View detail <span aria-hidden="true">→</span></a>
                    </div>
                </article>
            @empty
                <div class="empty-state"><h2>Services coming soon</h2><p>Our care team is preparing this information.</p></div>
            @endforelse
        </div>
        <div class="service-pagination" aria-label="Services pagination">{{ $services->links() }}</div>
    </div>
</section>
@endsection
