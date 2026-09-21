@extends('layouts.site')

@section('title', 'Specialities | Aarogya Hospital')
@section('heading', 'Our Specialities')
@section('intro', 'Specialist care tailored to every stage of your health journey.')

@section('content')
<section class="inner-section">
    <div class="wrap">
        <div class="speciality-directory">
            @forelse($specialities as $speciality)
                <article class="speciality-directory-card">
                    <div class="speciality-directory-image">
                        <img src="{{ asset($speciality->image) }}" alt="{{ $speciality->name }}" loading="lazy">
                    </div>
                    <div class="speciality-directory-body">
                        @if($speciality->short_label)<span>{{ $speciality->short_label }}</span>@endif
                        <h2>{{ $speciality->name }}</h2>
                        @if($speciality->description)<p>{{ $speciality->description }}</p>@endif
                    </div>
                </article>
            @empty
                <div class="empty-state"><h2>Specialities coming soon</h2><p>Our care team is preparing this information.</p></div>
            @endforelse
        </div>
    </div>
</section>
@endsection
