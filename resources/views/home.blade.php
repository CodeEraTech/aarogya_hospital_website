<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Aarogya Hospital | Advanced Care. Human at Heart.</title>
    <meta name="description" content="Advanced orthopaedics, robotic joint replacement, trauma, emergency and fertility care in Hisar, Haryana.">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="Aarogya Hospital | Advanced Care. Human at Heart.">
    <meta property="og:description" content="A healthier tomorrow starts here — advanced care with a human touch.">
    <meta property="og:image" content="{{ asset('assets/hospital/images/aarogya-hero.jpg') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/hospital/css/site.css') }}?v={{ filemtime(public_path('assets/hospital/css/site.css')) }}">
    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": ["Hospital", "MedicalClinic"],
            "name": "Dr. Bhutani’s Aarogya Hospital",
            "url": "{{ url('/') }}",
            "telephone": "+911662245450",
            "address": {
                "@@type": "PostalAddress",
                "streetAddress": "Opposite Vishwas School, Near LIC Office, Urban Estate II",
                "postalCode": "125001",
                "addressLocality": "Hisar",
                "addressRegion": "Haryana",
                "addressCountry": "IN"
            },
            "medicalSpecialty": ["Orthopedic", "Emergency", "Gynecologic"]
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <a class="skip-link" href="#main">Skip to main content</a>
    <div class="utility">
        <div class="wrap utility-inner"><span><b>CARE WITH COMPASSION</b><i></i> Hisar, Haryana</span>
            <nav aria-label="Utility"><a href="/emergency">◉ 24×7 Emergency</a><a data-track="phone" href="tel:+911662245450">☎ 01662-245450</a></nav>
        </div>
    </div>
    <header class="site-header">
        <div class="wrap nav-row"><a class="logo" href="/" aria-label="Aarogya Hospital home"><img class="hospital-logo" src="{{ asset('assets/hospital/images/aarogya-logo.png') }}" alt="Dr. Bhutani’s Aarogya Hospital" width="597" height="250"></a><button class="menu-btn" type="button" aria-expanded="false" aria-controls="main-nav"><span></span><span></span><span></span><b class="sr-only">Open menu</b></button>
            <nav class="main-nav" id="main-nav" aria-label="Main navigation"><a class="active" href="/">Home</a><a href="{{ route('about') }}">About</a><a href="#specialities">Specialities</a><a href="#doctors">Doctors</a><a href="{{ route('opd-schedule') }}">OPD Schedule</a><a href="{{ route('gallery') }}">Gallery</a>
                <details class="nav-dropdown">
                    <summary class="nav-dropdown-toggle">Empanelled Corporate <span class="nav-chevron" aria-hidden="true"></span></summary>
                    <div class="nav-dropdown-menu">@foreach(config('empanelled') as $item)<a href="{{ route('empanelled-corporate', ['slug' => $item['slug']]) }}">{{ $item['name'] }}</a>@endforeach</div>
                </details><a href="#contact">Contact</a>
            </nav><button class="btn btn-primary header-cta" type="button" data-open-appointment>Book Appointment <span>→</span></button><span class="header-accreditation"><img src="{{ asset('assets/hospital/images/nabh-accredited.png') }}" alt="NABH Accredited" width="768" height="768"></span>
        </div>
    </header>
    <main id="main">
        <section class="hero" id="about">
            <div class="wrap hero-grid">
                <div class="hero-copy reveal">
                    <div class="eyebrow">WELCOME TO BETTER CARE</div>
                    <h1>Aarogya <br>Hospital<span class="hero-tagline">Expert care.<br>Human at heart.</span></h1>
                    <p>Advanced Orthopaedic, Robotic Surgery, Trauma and Fertility Care — with a human touch.</p>
                    <div class="hero-actions"><button class="btn btn-primary" type="button" data-open-appointment>Book an Appointment <span>→</span></button><a class="btn btn-outline" href="#specialities">Explore Our Services <span>↓</span></a></div>
                    <div class="hero-points"><span><i>♡</i>World-Class<br>Technology</span><span><i>♙</i>Experienced<br>Specialists</span><span><i>♧</i>Personalised<br>Care</span><span><i>✧</i>Better<br>Outcomes</span></div>
                </div>
            </div>
        </section>
        <section class="stats-wrap" aria-label="Hospital information">
            <div class="wrap stats">
                <div><strong>10 years</strong><span>Committed to care</span></div>
                <div><strong>10 AM–3 PM</strong><span>OPD · Monday–Saturday</span></div>
                <div><strong>VELYS™</strong><span>Robotic knee replacement</span></div>
                <div><strong>24 × 7</strong><span>Orthopaedic &amp; Obs-Gynae emergency</span></div>
            </div>
        </section>
        <section class="section" id="specialities">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow">OUR SPECIALITIES</div>
                        <h2>Specialist care. Personal attention.</h2>
                    </div><a href="/specialities">Explore all specialities <span>→</span></a>
                </div>
                <div class="speciality-grid">
                    <article class="speciality-card reveal" style="--delay:0ms">
                        <div class="service-art art-1"><span>01</span><small>BONE &amp; JOINT CARE</small></div>
                        <div>
                            <h3>Advanced Orthopaedics</h3>
                            <p>Joint replacement, sports injury, arthritis and complete bone &amp; joint care.</p><a aria-label="Learn more about Advanced Orthopaedics" href="/specialities/orthopaedics">→</a>
                        </div>
                    </article>
                    <article class="speciality-card reveal" style="--delay:70ms">
                        <div class="service-art art-2"><span>02</span><small>PRECISION SURGERY</small></div>
                        <div>
                            <h3>Robotic Joint Replacement</h3>
                            <p>Next-generation precision-assisted surgery for better mobility.</p><a aria-label="Learn more about Robotic Joint Replacement" href="/specialities/robotic-joint-replacement">→</a>
                        </div>
                    </article>
                    <article class="speciality-card reveal" style="--delay:140ms">
                        <div class="service-art art-3"><span>03</span><small>FERTILITY CARE</small></div>
                        <div>
                            <h3>Gynaecology &amp; Infertility</h3>
                            <p>Care for infertility, pregnancy and women’s health.</p><a aria-label="Learn more about Infertility &amp; IVF" href="/specialities/infertility-ivf">→</a>
                        </div>
                    </article>
                    <article class="speciality-card reveal" style="--delay:210ms">
                        <div class="service-art art-4"><span>04</span><small>ROUND-THE-CLOCK CARE</small></div>
                        <div>
                            <h3>Emergency &amp; Trauma Care</h3>
                            <p>24/7 emergency care for orthopaedic and obstetrics-gynaecology patients.</p><a aria-label="Learn more about Emergency &amp; Trauma Care" href="/specialities/trauma-emergency">→</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="robotic-section" id="robotic">
            <div class="wrap robotic-panel reveal">
                <div class="robotic-copy">
                    <div class="eyebrow">PRECISION MEETS EXPERIENCE</div>
                    <h2>Robotic-Assisted<br><em>Joint Replacement</em></h2>
                    <p>VELYS™ robotic-assisted knee replacement, supported by the hospital’s orthopaedic team.</p><a class="btn btn-primary" data-track="robotic" href="/robotic-surgery">Discover Robotic Surgery <span>→</span></a>
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
                    </div><a href="{{ route('doctors.index') }}">View All Doctors <span>→</span></a>
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
                            <button class="doctor-book" type="button" data-open-appointment data-appointment-doctor="{{ $doctor->name }}">Book consultation →</button>
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
                    <p>Arrange a consultation with our specialist team.</p><button class="btn btn-light" type="button" data-open-appointment>Book an Appointment <span>→</span></button>
                </aside>
            </div>
        </section>
        <section class="section" id="blogs">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow">HEALTH INSIGHTS</div>
                        <h2>Latest from Our Blog</h2>
                    </div><a href="{{ route('blogs.index') }}">View All Blogs <span>→</span></a>
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
                            <a class="blog-card-link" href="{{ route('blogs.show', $blog->slug) }}">Read More <span>→</span></a>
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
    </main>
    <footer class="footer" id="contact">
        <div class="wrap footer-grid">
            <div><a class="logo footer-logo" href="/"><img class="hospital-logo" src="{{ asset('assets/hospital/images/aarogya-logo.png') }}" alt="Dr. Bhutani’s Aarogya Hospital" width="597" height="250"></a>
                <p>Advanced orthopaedic, trauma and fertility care with modern technology and a human touch.</p>
            </div>
            <div>
                <h3>Quick Links</h3><a href="#about">About</a><a href="#specialities">Specialities</a><a href="#doctors">Doctors</a><a href="#robotic">Robotic Surgery</a><a href="{{ route('gallery') }}">Gallery</a>
            </div>
            <div>
                <h3>Patient Resources</h3><button type="button" data-open-appointment>Appointment</button><a href="{{ route('empanelled-corporate', ['slug' => config('empanelled.1.slug')]) }}">Insurance &amp; Empanelment</a><a href="{{ route('opd-schedule') }}">OPD Schedule</a><a href="{{ route('feedback.create') }}">Patient Feedback</a><a href="{{ route('emergency') }}">Emergency</a>
            </div>
            <div>
                <h3>Contact</h3><a href="tel:+911662245450">01662-245450</a><a href="tel:+918222049007">+91 82220 49007</a><a href="tel:+918222049008">+91 82220 49008</a><span>Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001</span>
            </div>
        </div>
        <div class="wrap footer-bottom"><span>© 2026 Aarogya Hospital. All rights reserved.</span><span><a href="/privacy">Privacy Policy</a> · <a href="/terms">Terms</a> · <a href="/disclaimer">Disclaimer</a></span></div>
    </footer>
    <a class="whatsapp-float" data-track="phone" href="tel:+918222049007" aria-label="Call Aarogya Hospital">☎<span>Call the care team</span></a>
    <nav class="mobile-cta" aria-label="Quick actions"><a href="tel:+911662245450">☎<span>Call</span></a><a href="tel:+918222049007">☎<span>Helpline</span></a><button type="button" data-open-appointment>▣<span>Appointment</span></button></nav>
    <dialog class="appointment-dialog" id="appointment-dialog">
        <div class="dialog-head">
            <div>
                <div class="eyebrow">REQUEST A CONSULTATION</div>
                <h2>Book an Appointment</h2>
                <p>Share a few details. Our care team will call you shortly.</p>
            </div><button type="button" data-close-appointment aria-label="Close appointment form">×</button>
        </div>@if(session('appointment_success'))<div class="form-success" role="status"><i>✓</i>
            <h3>Thank you.</h3>
            <p>Your appointment request has been received. Our team will contact you shortly.</p><button class="btn btn-primary" type="button" data-close-appointment>Done</button>
        </div>@else @if($errors->any())<div class="form-error" role="alert">{{ $errors->first() }}</div>@endif<form class="appointment-form" method="post" action="{{ route('appointments.store') }}" novalidate>@csrf<label><span>Patient Name *</span><input name="name" autocomplete="name" maxlength="80" required value="{{ old('name') }}" placeholder="Your full name"></label><label><span>Mobile Number *</span><input name="phone" type="tel" autocomplete="tel" inputmode="numeric" maxlength="18" required value="{{ old('phone') }}" placeholder="10-digit mobile number"></label><label><span>Email <small>(optional)</small></span><input name="email" type="email" autocomplete="email" value="{{ old('email') }}" placeholder="you@example.com"></label><label><span>Speciality *</span><select name="speciality" required>
                    <option value="">Select speciality</option>@foreach(['Orthopaedics','Robotic Joint Replacement','Infertility & IVF','Trauma','Other'] as $speciality)<option @selected(old('speciality')===$speciality)>{{ $speciality }}</option>@endforeach
                </select></label><label><span>Preferred Doctor <small>(optional)</small></span><select name="doctor">
                    <option value="">Any available specialist</option>@foreach(['Dr. Amit Bhutani','Dr. Puja Bhutani','Dr. Deepak Gupta','Dr. Gunjan Gupta','Dr. Sachin Thakral'] as $doctor)<option @selected(old('doctor')===$doctor)>{{ $doctor }}</option>@endforeach
                </select></label><label><span>Preferred Date</span><input name="date" type="date" min="{{ now()->toDateString() }}" value="{{ old('date') }}"></label><label><span>Preferred Time</span><select name="time">
                    <option value="">Select a time</option>@foreach(['Morning (10 AM–12 PM)','Afternoon (12–3 PM)'] as $time)<option @selected(old('time')===$time)>{{ $time }}</option>@endforeach
                </select></label><label class="full"><span>Message / Concern</span><textarea name="message" maxlength="800" placeholder="Briefly tell us how we can help (avoid sharing sensitive medical information)">{{ old('message') }}</textarea></label>
            <p class="privacy-note full">By submitting, you consent to being contacted about this appointment request.</p><button class="btn btn-primary full submit-btn" type="submit">Submit Appointment Request <span>→</span></button>
        </form>@endif
    </dialog>
    <script>
        window.AAROGYA_FORM_STATE = {
            "open": {
                {
                    (session('appointment_success') || $errors - > any()) ? 'true' : 'false'
                }
            }
        };
    </script>
    <script src="/assets/hospital/js/site.js?v={{ filemtime(public_path('assets/hospital/js/site.js')) }}" defer></script>
</body>

</html>
