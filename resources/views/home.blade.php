@extends('layouts.site')

@section('title', 'Aarogya Hospital | Advanced Care. Human at Heart.')
@section('description', 'Advanced orthopaedics, robotic joint replacement, trauma, emergency and fertility care in Hisar, Haryana.')

@section('content')
<section class="hero hero-slider" id="hero">
    @if(isset($slides) && $slides->count() > 0)
    <div class="hero-carousel">
        @foreach($slides as $index => $slide)
        <div class="hero-slide @if($index === 0) active @endif" data-slide="{{ $index }}">
            @if($slide->image)
            <div class="hero-background" style="background-image: url('{{ asset($slide->image) }}')"></div>
            @endif
            <div class="wrap hero-grid">
                <div class="hero-copy">
                    @if($slide->slug)
                    <div class="eyebrow">{{ strtoupper($slide->slug) }}</div>
                    @endif
                    <h1>{!! nl2br(e($slide->title)) !!}</h1>
                    @if($slide->subtitle)
                    <p class="hero-description">{{ strip_tags($slide->subtitle) }}</p>
                    @endif
                    <div class="hero-actions">
                        @if($slide->button_text && $slide->button_url)
                        <a class="btn btn-primary" href="{{ $slide->button_url }}">{{ $slide->button_text }} <span aria-hidden="true">&rarr;</span></a>
                        @endif
                        <a class="btn btn-outline" href="{{ route('services.index') }}">Explore Our Services <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if($slides->count() > 1)
    <div class="hero-controls">
        <button class="hero-control hero-prev" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>
        <button class="hero-control hero-next" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>
    </div>
    <div class="hero-indicators">
        @foreach($slides as $index => $slide)
        <button class="hero-indicator @if($index === 0) active @endif" data-slide="{{ $index }}" aria-label="Go to slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    @endif
    @else
    <div class="hero-slide active">
        <div class="hero-background" style="background-image: url('/assets/hospital/images/aarogya-hero.jpg')"></div>
        <div class="wrap hero-grid">
            <div class="hero-copy">
                <div class="eyebrow">WELCOME TO BETTER CARE</div>
                <h1>Aarogya <br>Hospital<span class="hero-tagline">Expert care.<br>Human at heart.</span></h1>
                <p class="hero-description">Advanced Orthopaedic, Robotic Surgery, Trauma and Fertility Care &mdash; with a human touch.</p>
                <div class="hero-actions"><a class="btn btn-primary" href="{{ route('appointment.create') }}">Book an Appointment <span aria-hidden="true">&rarr;</span></a><a class="btn btn-outline" href="{{ route('services.index') }}">Explore Our Services <span aria-hidden="true">&rarr;</span></a></div>
                <div class="hero-points"><span><i aria-hidden="true">&#9825;</i>World-Class<br>Technology</span><span><i aria-hidden="true">&#9813;</i>Experienced<br>Specialists</span><span><i aria-hidden="true">&#9827;</i>Personalised<br>Care</span><span><i aria-hidden="true">&#10023;</i>Better<br>Outcomes</span></div>
            </div>
        </div>
    </div>
    @endif
</section>
<section class="info-cards-section" aria-label="Hospital information">
    <div class="info-cards-wrap">
        <!-- ===================== OPD HOURS ===================== -->
        <article class="info-card info-card-blue">
            <div class="info-card-header">
                <div class="info-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <rect x="3.5" y="2.5" width="17" height="19" rx="5"></rect>
                        <path d="M12 7.5V12.5"></path>
                        <path d="M12 16.5V16.51"></path>
                    </svg>
                </div>
                <h3>OPD HOURS</h3>
            </div>
            <p>
                {{ $stats['stat_opd_hours'] ?? 'Monday - Saturday: 10:00 AM - 03:00 PM' }}
            </p>
            <a href="/contact" class="info-card-link">
                <span>Know More</span>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12H19"></path>
                    <path d="M13 6L19 12L13 18"></path>
                </svg>
            </a>
        </article>
        <!-- ===================== FIND A DOCTOR ===================== -->
        <article class="info-card info-card-green">
            <div class="info-card-header">
                <div class="info-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M8 4V7"></path>
                        <path d="M16 4V7"></path>
                        <path d="M7 6H9"></path>
                        <path d="M15 6H17"></path>
                        <path d="M8.5 8.5H15.5C17.43 8.5 19 10.07 19 12V13.5C19 15.43 17.43 17 15.5 17H14V20"></path>
                        <path d="M8.5 8.5C6.57 8.5 5 10.07 5 12V13.5C5 15.43 6.57 17 8.5 17H10V20"></path>
                        <circle cx="19" cy="10" r="2"></circle>
                    </svg>
                </div>
                <h3>FIND A DOCTOR</h3>
            </div>
            <p>
                {{ $stats['stat_find_doctor'] ?? 'Meet the Orthopaedics specialist and Obs-Gynae Specialist' }}
            </p>
            <a href="/doctors" class="info-card-link">
                <span>Know More</span>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12H19"></path>
                    <path d="M13 6L19 12L13 18"></path>
                </svg>
            </a>
        </article>
        <!-- ===================== OUR LOCATION ===================== -->
        <article class="info-card info-card-purple">
            <div class="info-card-header">
                <div class="info-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M3.5 7.5H15.5V18.5H3.5V7.5Z"></path>
                        <path d="M15.5 10H19L21 13V18.5H15.5"></path>
                        <circle cx="7.5" cy="18.5" r="2"></circle>
                        <circle cx="17.5" cy="18.5" r="2"></circle>
                        <path d="M7.5 11V14"></path>
                        <path d="M6 12.5H9"></path>
                    </svg>
                </div>
                <h3>OUR LOCATION</h3>
            </div>
            <p>
                {{ $stats['stat_our_location'] ?? 'Opposite Vishwas School, Near Lic Office, Urban Estate II, Hisar, Haryana 125001' }}
            </p>
            <a href="/contact" class="info-card-link">
                <span>Know More</span>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12H19"></path>
                    <path d="M13 6L19 12L13 18"></path>
                </svg>
            </a>
        </article>
        <!-- ===================== CONNECT WITH US ===================== -->
        <article class="info-card info-card-pink">
            <div class="info-card-header">
                <div class="info-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5.5 4H9L11 9L8.5 10.5C9.57 12.67 11.33 14.43 13.5 15.5L15 13L20 15V18.5C20 19.6 19.1 20.5 18 20.5C10.27 20.5 3.5 13.73 3.5 6C3.5 4.9 4.4 4 5.5 4Z"></path>
                        <path d="M17 3V8"></path>
                        <path d="M14.5 5.5H19.5"></path>
                    </svg>
                </div>
                <h3>CONNECT WITH US</h3>
            </div>
            <p>
                {{ $stats['stat_connect_with_us'] ?? 'CALL: 01662-245450, 8222049007, 8222049008' }}
            </p>
            <a href="/contact" class="info-card-link">
                <span>Know More</span>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12H19"></path>
                    <path d="M13 6L19 12L13 18"></path>
                </svg>
            </a>
        </article>
    </div>
</section>

<section class="robotic-section" id="robotic">
    <div class="wrap robotic-panel reveal">
        <div class="robotic-copy">
            <div class="eyebrow">PRECISION MEETS EXPERIENCE</div>
            <h2>Robotic-Assisted<br><em>Joint Replacement</em></h2>
            <p>VELYS&trade; robotic-assisted knee replacement, supported by the hospital&rsquo;s orthopaedic team.</p><a class="btn btn-primary" data-track="robotic" href="/robotic-surgery">Discover Robotic Surgery <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="robotic-image"><img src="/assets/hospital/images/robotic-surgery.png" width="1792" height="1024" loading="lazy" alt="Robotic joint-replacement planning system in a modern operating theatre"></div>
    </div>
</section>

<section class="section" id="specialities">
    <div class="wrap">
        <div class="section-head">
            <div>
                <div class="eyebrow">OUR SPECIALITIES</div>
                <h2>Specialist care. Personal attention.</h2>
            </div><a href="{{ route('services.index') }}">Explore all services <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="speciality-grid">
            @forelse($services as $index => $service)
            <article class="speciality-card service-card reveal" style="--delay:{{ $index * 70 }}ms">
                @if($service->image)
                <img class="service-card-image" src="{{ asset($service->image) }}" alt="{{ $service->name }}" loading="lazy">
                @else
                <div class="service-art art-{{ ($index % 4) + 1 }}"><span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><small>{{ strtoupper($service->name) }}</small></div>
                @endif
                <div>
                    <h3>{{ $service->name }}</h3>
                    <p>{{ Str::limit(strip_tags($service->description ?? 'Explore this service at Aarogya Hospital.'), 150) }}</p><a aria-label="Learn more about {{ $service->name }}" href="{{ route('services.show', $service->slug) }}">&rarr;</a>
                </div>
            </article>
            @empty
            <p class="empty-state">Our services will be listed here shortly.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="section doctors-section" id="doctors">
    <div class="wrap">
        <div class="section-head">
            <div>
                <div class="eyebrow">MEET OUR SPECIALISTS</div>
                <h2>Experts Who Care</h2>
            </div><a href="{{ route('doctors.index') }}">View All Doctors <span aria-hidden="true">&rarr;</span></a>
        </div>
        @if(isset($doctors) && $doctors->count() > 0)
        <div class="doctor-grid">
            @foreach($doctors as $doctor)
            <article class="doctor-card">
                <div class="doctor-photo">
                    @if($doctor->image && file_exists(public_path($doctor->image)))
                    <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name }}" width="684" height="1024" loading="lazy">
                    @else
                    <img src="{{ asset('assets/hospital/images/doctor-placeholder.jpg') }}" alt="{{ $doctor->name }}" width="684" height="1024" loading="lazy">
                    @endif
                </div>
                <div>
                    <h3>{{ $doctor->name }}</h3>
                    @if($doctor->designation)
                    <p>{{ $doctor->designation }}</p>
                    @endif
                    <a class="doctor-book" href="{{ route('appointment.create') }}">Book consultation <span aria-hidden="true">&rarr;</span></a>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <p style="text-align: center; color: var(--muted); padding: 40px 0;">No doctors available at the moment.</p>
        @endif
    </div>
</section>
<section class="stories" id="resources">
    <div class="wrap story-layout">
        <div class="testimonials-carousel-wrapper">
            <div class="eyebrow">PATIENT TESTIMONIALS</div>
            <h2>Hear from our patients.</h2>
            @if(isset($testimonials) && $testimonials->count() > 0)
            <div class="testimonials-carousel" data-testimonials-carousel>
                @foreach($testimonials as $index => $testimonial)
                <div class="testimonial-slide" data-testimonial-index="{{ $index }}" @if($index===0) data-active @endif>
                    <blockquote class="testimonial-quote">
                        <p>"{{ $testimonial->quote }}"</p>
                        <footer class="testimonial-author">
                            <strong>{{ $testimonial->name }}</strong>
                            @if($testimonial->designation)
                            <span>{{ $testimonial->designation }}</span>
                            @endif
                        </footer>
                    </blockquote>
                </div>
                @endforeach
            </div>
            @if($testimonials->count() > 1)
            <div class="testimonial-dots" data-testimonial-dots>
                @foreach($testimonials as $index => $testimonial)
                <button type="button" class="testimonial-dot" data-dot-index="{{ $index }}" @if($index===0) data-active @endif aria-label="View testimonial {{ $index + 1 }}"></button>
                @endforeach
            </div>
            @endif
            @else
            <p>No testimonials available at the moment.</p>
            @endif
        </div>
        <aside class="priority">
            <h2>Your Health<br>Our Priority</h2>
            <p>Arrange a consultation with our specialist team.</p><a class="btn btn-light" href="{{ route('appointment.create') }}">Book an Appointment <span aria-hidden="true">&rarr;</span></a>
        </aside>
    </div>
</section>
<section class="section" id="blogs">
    <div class="wrap">
        <div class="section-head">
            <div>
                <div class="eyebrow">HEALTH INSIGHTS</div>
                <h2>Latest from Our Blog</h2>
            </div><a href="{{ route('blogs.index') }}">View All Blogs <span aria-hidden="true">&rarr;</span></a>
        </div>
        @if(isset($blogs) && $blogs->count() > 0)
        <div class="blog-directory">
            @foreach($blogs as $blog)
            <article class="blog-card">
                <a href="{{ route('blogs.show', $blog->slug) }}">
                    @if($blog->image)
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" loading="lazy">
                    @else
                    <img src="{{ asset('assets/hospital/images/placeholder-blog.jpg') }}" alt="{{ $blog->title }}" loading="lazy">
                    @endif
                </a>
                <div class="blog-card-body">
                    @if($blog->published_at)
                    <time datetime="{{ $blog->published_at->format('Y-m-d') }}">{{ $blog->published_at->format('M d, Y') }}</time>
                    @endif
                    <h2><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                    <p>{{ Str::limit(strip_tags($blog->excerpt ?? $blog->content), 120) }}</p>
                    <a class="blog-card-link" href="{{ route('blogs.show', $blog->slug) }}">Read More <span aria-hidden="true">&rarr;</span></a>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <p style="text-align: center; color: var(--muted); padding: 40px 0;">No blogs available at the moment.</p>
        @endif
    </div>
</section>
<section class="why" id="gallery">
    <div class="wrap pillars">
        <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false">
                    <path d="m8 22 16-14 16 14v18H8Z"></path>
                    <path d="M18 40V26h12v14"></path>
                </svg></span><span>Modern Infrastructure</span></div>
        <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false">
                    <circle cx="24" cy="24" r="8"></circle>
                    <path d="M24 6v6m0 24v6M6 24h6m24 0h6M11.3 11.3l4.2 4.2m17 17 4.2 4.2m0-25.4-4.2 4.2m-17 17-4.2 4.2M31 24a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"></path>
                </svg></span><span>Advanced Technology</span></div>
        <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false">
                    <path d="M24 39S8 29 8 18a8 8 0 0 1 16-3 8 8 0 0 1 16 3c0 11-16 21-16 21Z"></path>
                </svg></span><span>Compassionate Care</span></div>
        <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false">
                    <circle cx="24" cy="15" r="6"></circle>
                    <path d="M12 39c1-8 5-12 12-12s11 4 12 12M35 10v8m-4-4h8"></path>
                </svg></span><span>Experienced Specialists</span></div>
        <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false">
                    <circle cx="24" cy="24" r="16"></circle>
                    <path d="M17 17h14M17 23h14M20 29h10M20 11c3 3 5 7 5 13s-2 10-5 13"></path>
                </svg></span><span>Affordable Treatment</span></div>
        <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false">
                    <circle cx="24" cy="24" r="14"></circle>
                    <circle cx="24" cy="24" r="5"></circle>
                    <path d="M24 4v7m0 26v7M4 24h7m26 0h7"></path>
                </svg></span><span>Convenient Location</span></div>
    </div>
</section>
@include('partials.google-map')
@endsection