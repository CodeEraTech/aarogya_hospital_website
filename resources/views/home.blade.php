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
                                <a class="btn btn-primary" href="{{ $slide->button_url }}">{{ $slide->button_text }} <span>â†’</span></a>
                                @endif
                                <a class="btn btn-outline" href="{{ route('services.index') }}">Explore Our Services <span>â†“</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if($slides->count() > 1)
            <div class="hero-controls">
                <button class="hero-control hero-prev" aria-label="Previous slide">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button class="hero-control hero-next" aria-label="Next slide">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
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
                        <p class="hero-description">Advanced Orthopaedic, Robotic Surgery, Trauma and Fertility Care â€” with a human touch.</p>
                        <div class="hero-actions"><a class="btn btn-primary" href="{{ route('appointment.create') }}">Book an Appointment <span>â†’</span></a><a class="btn btn-outline" href="{{ route('services.index') }}">Explore Our Services <span>â†“</span></a></div>
                        <div class="hero-points"><span><i>â™¡</i>World-Class<br>Technology</span><span><i>â™™</i>Experienced<br>Specialists</span><span><i>â™§</i>Personalised<br>Care</span><span><i>âœ§</i>Better<br>Outcomes</span></div>
                    </div>
                </div>
            </div>
            @endif
        </section>
        <section class="stats-wrap" aria-label="Hospital information">
            <div class="wrap stats">
                <div><strong>10 years</strong><span>Committed to care</span></div>
                <div><strong>10 AMâ€“3 PM</strong><span>OPD Â· Mondayâ€“Saturday</span></div>
                <div><strong>VELYSâ„¢</strong><span>Robotic knee replacement</span></div>
                <div><strong>24 Ã— 7</strong><span>Orthopaedic &amp; Obs-Gynae emergency</span></div>
            </div>
        </section>
        <section class="section" id="specialities">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow">OUR SPECIALITIES</div>
                        <h2>Specialist care. Personal attention.</h2>
                    </div><a href="{{ route('services.index') }}">Explore all services <span>â†’</span></a>
                </div>
                <div class="speciality-grid">
                    @forelse($services as $index => $service)
                    <article class="speciality-card service-card reveal" style="--delay:{{ $index * 70 }}ms">
                        @if($service->image)
                        <img class="service-card-image" src="{{ asset($service->image) }}" alt="{{ $service->name }}" loading="lazy">
                        @else
                        <div class="service-art art-{{ ($index % 4) + 1 }}"><span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><small>{{ strtoupper($service->name) }}</small></div>
                        @endif
                        <div><h3>{{ $service->name }}</h3><p>{{ Str::limit(strip_tags($service->description ?? 'Explore this service at Aarogya Hospital.'), 150) }}</p><a aria-label="Learn more about {{ $service->name }}" href="{{ route('services.show', $service->slug) }}">→</a></div>
                    </article>
                    @empty
                    <p class="empty-state">Our services will be listed here shortly.</p>
                    @endforelse
                </div>
            </div>
        </section>
        <section class="robotic-section" id="robotic">
            <div class="wrap robotic-panel reveal">
                <div class="robotic-copy">
                    <div class="eyebrow">PRECISION MEETS EXPERIENCE</div>
                    <h2>Robotic-Assisted<br><em>Joint Replacement</em></h2>
                    <p>VELYSâ„¢ robotic-assisted knee replacement, supported by the hospitalâ€™s orthopaedic team.</p><a class="btn btn-primary" data-track="robotic" href="/robotic-surgery">Discover Robotic Surgery <span>â†’</span></a>
                </div>
                <div class="robotic-image"><img src="/assets/hospital/images/robotic-surgery.jpg" width="1792" height="1024" loading="lazy" alt="Robotic joint-replacement planning system in a modern operating theatre"></div>
                <ul class="benefits">
                    <li><span>Robotic knee replacement</span></li>
                    <li><span>Hip replacement</span></li>
                    <li><span>Sports injury care</span></li>
                    <li><span>Orthopaedic trauma</span></li>
                </ul>
            </div>
        </section>
        <section class="section doctors-section" id="doctors">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow">MEET OUR SPECIALISTS</div>
                        <h2>Experts Who Care</h2>
                    </div><a href="{{ route('doctors.index') }}">View All Doctors <span>â†’</span></a>
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
                            <a class="doctor-book" href="{{ route('appointment.create') }}">Book consultation â†’</a>
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
                        <div class="testimonial-slide" data-testimonial-index="{{ $index }}" @if($index === 0) data-active @endif>
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
                        <button type="button" class="testimonial-dot" data-dot-index="{{ $index }}" @if($index === 0) data-active @endif aria-label="View testimonial {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    @endif
                    @else
                    <p>No testimonials available at the moment.</p>
                    @endif
                </div>
                <aside class="priority">
                    <h2>Your Health<br>Our Priority</h2>
                    <p>Arrange a consultation with our specialist team.</p><a class="btn btn-light" href="{{ route('appointment.create') }}">Book an Appointment <span>â†’</span></a>
                </aside>
            </div>
        </section>
        <section class="section" id="blogs">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow">HEALTH INSIGHTS</div>
                        <h2>Latest from Our Blog</h2>
                    </div><a href="{{ route('blogs.index') }}">View All Blogs <span>â†’</span></a>
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
                            <a class="blog-card-link" href="{{ route('blogs.show', $blog->slug) }}">Read More <span>â†’</span></a>
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
                <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false"><path d="m8 22 16-14 16 14v18H8Z"></path><path d="M18 40V26h12v14"></path></svg></span><span>Modern Infrastructure</span></div>
                <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false"><circle cx="24" cy="24" r="8"></circle><path d="M24 6v6m0 24v6M6 24h6m24 0h6M11.3 11.3l4.2 4.2m17 17 4.2 4.2m0-25.4-4.2 4.2m-17 17-4.2 4.2M31 24a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"></path></svg></span><span>Advanced Technology</span></div>
                <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false"><path d="M24 39S8 29 8 18a8 8 0 0 1 16-3 8 8 0 0 1 16 3c0 11-16 21-16 21Z"></path></svg></span><span>Compassionate Care</span></div>
                <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false"><circle cx="24" cy="15" r="6"></circle><path d="M12 39c1-8 5-12 12-12s11 4 12 12M35 10v8m-4-4h8"></path></svg></span><span>Experienced Specialists</span></div>
                <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false"><circle cx="24" cy="24" r="16"></circle><path d="M17 17h14M17 23h14M20 29h10M20 11c3 3 5 7 5 13s-2 10-5 13"></path></svg></span><span>Affordable Treatment</span></div>
                <div><span class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 48 48" focusable="false"><circle cx="24" cy="24" r="14"></circle><circle cx="24" cy="24" r="5"></circle><path d="M24 4v7m0 26v7M4 24h7m26 0h7"></path></svg></span><span>Convenient Location</span></div>
            </div>
        </section>
@include('partials.google-map')
@endsection

