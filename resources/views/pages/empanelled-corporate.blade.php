@extends('layouts.site')
@section('title', $section['name'].' | Empanelled Corporate')
@section('heading', $section['name'])
@section('intro', 'Current empanelment information and partner details.')
@section('content')
<section class="inner-section"><div class="wrap">
    @if($record?->content)<section class="empanelment-content rich-content">{!! $record->content !!}</section>@endif
    @if($record?->images)<div class="partner-logo-grid" aria-label="{{ $section['name'] }} images">@foreach($record->images as $image)<div><img src="{{ asset($image) }}" alt="{{ $section['name'] }} partner" loading="lazy"></div>@endforeach</div>@endif
    @if(!$record || (!$record->content && !$record->images))<div class="empty-state"><h2>Information coming soon</h2><p>Please contact our care team for the latest {{ strtolower($section['name']) }} information.</p></div>@endif
</div></section>
@endsection
