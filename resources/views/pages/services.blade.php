@extends('layouts.site')

@section('title', 'Services | Aarogya Hospital')
@section('heading', 'Our Services')
@section('intro', 'Specialist care tailored to every stage of your health journey.')

@section('content')
<section class="inner-section">
    <div class="wrap">
        <div class="service-directory">
            @forelse($services as $service)
                <article class="service-directory-card">
                    @if($service->image)
                        <div class="service-directory-image">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" loading="lazy">
                        </div>
                    @endif
                    <div class="service-directory-body">
                        <h2>{{ $service->name }}</h2>
                        @if($service->description)<p>{{ $service->description }}</p>@endif
                    </div>
                </article>
            @empty
                <div class="empty-state"><h2>Services coming soon</h2><p>Our care team is preparing this information.</p></div>
            @endforelse
        </div>
    </div>
</section>
@endsection
