@extends('layouts.site')

@section('title', $doctor->meta_title ?: $doctor->name.' | Aarogya Hospital')
@section('description', $doctor->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($doctor->description ?: $doctor->designation), 160))

@section('content')
<section class="doctor-profile-page">
    <div class="wrap">
        <div class="doctor-profile-grid">
            <div class="doctor-profile-photo">
                <img src="{{ $doctor->image ? asset($doctor->image) : asset('assets/hospital/images/doctor-placeholder.jpg') }}" alt="{{ $doctor->name }}" width="684" height="1024">
            </div>
            <div class="doctor-profile-main">
                <section class="doctor-profile-intro">
                    <h1>{{ $doctor->name }}</h1>
                    @if($doctor->designation)<p class="doctor-profile-designation">{{ $doctor->designation }}</p>@endif
                    @if($doctor->degree)<p class="doctor-profile-degree">{{ $doctor->degree }}</p>@endif
                    @if($contactSettings['email'] ?? null)<p><svg viewBox="0 0 20 20" aria-hidden="true"><rect x="3" y="5" width="14" height="11" rx="2"/><path d="m4 7 6 4 6-4"/></svg><a href="mailto:{{ $contactSettings['email'] }}">{{ $contactSettings['email'] }}</a></p>@endif
                    @if($contactSettings['phone'] ?? null)<p><svg viewBox="0 0 20 20" aria-hidden="true"><path d="M5 3h3l1 4-2 1c1 2 3 3 4 4l1-2 4 1v3c0 1-1 2-2 2C8 16 4 12 4 6c0-2 0-3 1-3Z"/></svg><a href="tel:{{ preg_replace('/[^0-9]+/', '', $contactSettings['phone']) }}">{{ $contactSettings['phone'] }}</a></p>@endif
                    @if($contactSettings['address'] ?? null)<p><svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 18s6-5 6-10a6 6 0 1 0-12 0c0 5 6 10 6 10Z"/><circle cx="10" cy="8" r="2"/></svg><span>{{ $contactSettings['address'] }}</span></p>@endif
                </section>
                <div class="doctor-profile-lower">
                    <section class="doctor-about-card">
                        <h2>About {{ str_starts_with(strtolower($doctor->name), 'dr.') ? 'the doctor' : $doctor->name }}</h2>
                        @if($doctor->description)<div class="rich-content">{!! $doctor->description !!}</div>@else<p>Meet {{ $doctor->name }} at Aarogya Hospital, Hisar.</p>@endif
                    </section>
                    <aside class="doctor-hours-card">
                        @if($doctor->degree)<div><small>Degree</small><strong>{{ $doctor->degree }}</strong></div>@endif
                        @if($schedules->isNotEmpty())<div><small>OPD Hours</small>@foreach($schedules as $schedule)<span>{{ $schedule->days_label }}: {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</span>@endforeach</div>@endif
                        @if($doctor->emergency_text)<div><small>24/7 Emergency</small><span>{{ $doctor->emergency_text }}</span></div>@endif
                        <a class="btn btn-primary" href="{{ route('appointment.create') }}">Book Appointment</a>
                    </aside>
                </div>
            </div>
        </div>

        @if($testimonials->isNotEmpty())
        <section class="doctor-testimonials testimonials-carousel-wrapper" aria-labelledby="doctor-testimonials-title">
            <div class="doctor-testimonials-heading">
                <div><span class="eyebrow">PATIENT STORIES</span><h2 id="doctor-testimonials-title">What patients say</h2></div>
                @if($testimonials->count() > 1)
                <div class="doctor-testimonial-controls" aria-label="Testimonial navigation">
                    <button type="button" data-carousel-prev aria-label="Previous testimonials">&larr;</button>
                    <button type="button" data-carousel-next aria-label="Next testimonials">&rarr;</button>
                </div>
                @endif
            </div>
            <div class="doctor-testimonials-carousel" data-card-carousel>
                <div class="doctor-testimonial-row" data-testimonial-track>
                    @foreach($testimonials as $testimonial)
                        @php
                            $nameParts = preg_split('/\s+/', trim($testimonial->name ?? ''), -1, PREG_SPLIT_NO_EMPTY);
                            $initials = collect($nameParts)->take(2)->map(fn ($part) => strtoupper(substr($part, 0, 1)))->implode('') ?: 'P';
                        @endphp
                        <article class="testimonial-text-card doctor-testimonial-card">
                            <span class="testimonial-card-mark" aria-hidden="true">&ldquo;</span>
                            <blockquote>{{ $testimonial->quote }}</blockquote>
                            <footer><span class="testimonial-initials">{{ $initials }}</span><div><strong>{{ $testimonial->name ?: 'Patient' }}</strong><span>Aarogya Hospital patient</span></div></footer>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>
</section>

@endsection
