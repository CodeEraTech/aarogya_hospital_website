@extends('layouts.site')

@section('title', $service->name.' | Aarogya Hospital')
@section('description', $service->meta_description ?: ($service->description ?: 'Learn more about '.$service->name.' at Aarogya Hospital.'))
@section('keywords', $service->meta_tags ?: $service->name)
@section('heading', $service->name)
@section('intro', $service->description)

@section('content')
<section class="inner-section">
    <div class="wrap service-detail">
        @if($service->image)
            <img class="service-detail-image" src="{{ asset($service->image) }}" alt="{{ $service->name }}" loading="lazy">
        @endif
        @if($service->content)
            <div class="service-detail-content">{!! $service->content !!}</div>
        @elseif(!$service->image)
            <p class="empty-state">More information about this service will be available soon.</p>
        @endif
    </div>
</section>
@endsection
