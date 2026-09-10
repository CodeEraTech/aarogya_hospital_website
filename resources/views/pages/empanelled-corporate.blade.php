@extends('layouts.site')
@section('title', 'Empanelled Corporate')
@section('heading', 'Empanelled Corporate')
@section('intro', 'Insurance & Empanelment: contact our care team for current panel information and cashless treatment eligibility.')
@section('content')
<section class="inner-section"><div class="wrap">
    <nav class="empanelment-links" aria-label="Empanelment categories">
        <a href="#government-departments">Government Departments</a>
        <a href="#tpas">TPAs</a>
        <a href="#insurance-companies">Insurance Companies</a>
    </nav>
    <section class="empanelment-section" id="government-departments" aria-labelledby="government-heading">
        <div class="eyebrow">01 / GOVERNMENT PANELS</div>
        <h2 id="government-heading">Government Departments</h2>
        <p>Empanelled for Haryana Government employees, pensioners and their dependants.</p>
        <ul class="partner-logo-grid" aria-label="Government departments">
            <li><img src="{{ asset('assets/hospital/images/haryana-government.jpg') }}" alt="Haryana Government" width="274" height="90" loading="lazy"></li>
        </ul>
        <a href="tel:+911662245450">Confirm department eligibility <span aria-hidden="true">→</span></a>
    </section>
    <section class="empanelment-section" id="tpas" aria-labelledby="tpa-heading">
        <div class="eyebrow">02 / CASHLESS COORDINATION</div>
        <h2 id="tpa-heading">TPA’s</h2>
        <p>Contact our coordination desk to confirm whether your third-party administrator is currently accepted.</p>
        <a href="tel:+911662245450">Check your TPA <span aria-hidden="true">→</span></a>
    </section>
    <section class="empanelment-section" id="insurance-companies" aria-labelledby="insurance-heading">
        <div class="eyebrow">03 / INSURANCE PARTNERS</div>
        <h2 id="insurance-heading">Insurance Companies</h2>
        <p>Call with your insurer and policy details to confirm eligibility before your visit.</p>
        <a href="tel:+911662245450">Confirm insurance coverage <span aria-hidden="true">→</span></a>
    </section>
    <div class="notice-card"><span aria-hidden="true">ⓘ</span><div><h2>Please confirm before your visit</h2><p>Panel participation and cashless approval depend on your policy and treatment. Our coordination desk can help with the latest information.</p></div><a class="btn btn-primary" href="tel:+911662245450">Call 01662-245450</a></div>
</div></section>
@endsection
