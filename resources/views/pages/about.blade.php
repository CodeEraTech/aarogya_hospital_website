@extends('layouts.site')
@section('title', 'About Aarogya Hospital')
@section('heading', 'Care Led by Experience')
@section('intro', 'Aarogya Hospital brings advanced orthopaedic, robotic joint replacement, obstetrics-gynaecology and infertility care to Hisar.')
@section('content')
<section class="inner-section"><div class="wrap">
    <div class="about-intro"><span class="eyebrow">AAROGYA HOSPITAL, HISAR</span><h2>Specialist care with a clear focus on better outcomes.</h2><p>Our clinical team combines long-standing local experience with thoughtful, patient-centred treatment. From robotic knee replacement to infertility management and maternity care, every consultation begins with listening.</p></div>
    <div class="about-profiles">
        <article class="about-profile">
            <div class="about-photo"><img src="{{ asset('assets/hospital/images/dr-amit-bhutani.jpg') }}" alt="Dr. Amit Bhutani" width="684" height="1024"></div>
            <div class="about-profile-content"><span class="eyebrow">ORTHOPAEDICS &amp; JOINT REPLACEMENT</span><h2>Dr. Amit Bhutani</h2><p class="profile-role">Robotic Knee Replacement Specialist</p><p>Dr. Amit Bhutani has 25 years of experience in robotic knee joint replacement and orthopaedics. Previously Head of Orthopaedics at Jindal Hospital, Hisar for 10 years, he has been a pioneer of advanced robotic knee replacement and arthroscopy surgeries in the region. He was the first orthopaedic surgeon in Hisar to perform joint replacement surgery in 2004.</p>
                <dl class="profile-details"><div><dt>Qualification</dt><dd>M.B.B.S., M.S. (Ortho)</dd></div><div><dt>OPD hours</dt><dd>Monday–Saturday · 10 AM–3 PM</dd></div><div><dt>Emergency care</dt><dd>24/7 for orthopaedic patients</dd></div></dl>
                <button class="btn btn-primary" type="button" data-open-appointment data-appointment-doctor="Dr. Amit Bhutani">Book with Dr. Amit <span aria-hidden="true">→</span></button>
            </div>
        </article>
        <article class="about-profile about-profile-reverse">
            <div class="about-photo"><img src="{{ asset('assets/hospital/images/dr-puja-bhutani.jpg') }}" alt="Dr. Puja Bhutani" width="684" height="1024"></div>
            <div class="about-profile-content"><span class="eyebrow">OBSTETRICS, GYNAECOLOGY &amp; INFERTILITY</span><h2>Dr. Puja Bhutani</h2><p class="profile-role">Obs-Gynae &amp; Infertility Specialist</p><p>Dr. Puja Bhutani has 23 years of experience in obstetrics and gynaecology, with infertility management as a key clinical interest. She previously served as Senior Specialist and Medical Superintendent at Churamani Hospital for 10 years. Her practice includes infertility care, painless labour, gynaecological surgery, and normal and Caesarean deliveries.</p>
                <dl class="profile-details"><div><dt>Qualification</dt><dd>M.B.B.S., D.G.O.</dd></div><div><dt>OPD hours</dt><dd>Monday–Saturday · 10 AM–3 PM</dd></div><div><dt>Emergency care</dt><dd>24/7 for obstetrics-gynaecology patients</dd></div></dl>
                <button class="btn btn-primary" type="button" data-open-appointment data-appointment-doctor="Dr. Puja Bhutani">Book with Dr. Puja <span aria-hidden="true">→</span></button>
            </div>
        </article>
    </div>
    <aside class="about-contact"><div><span class="eyebrow">PLAN YOUR VISIT</span><h2>Talk to our care team.</h2><p>Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001</p></div><a class="btn btn-outline" href="tel:+911662245450">Call 01662-245450 <span aria-hidden="true">→</span></a></aside>
</div></section>
@endsection

