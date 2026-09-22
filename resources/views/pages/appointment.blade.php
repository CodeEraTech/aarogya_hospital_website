@extends('layouts.site')

@section('title', 'Book an Appointment | Aarogya Hospital')
@section('heading', 'Book an Appointment')
@section('intro', 'Share a few details and our care team will contact you shortly.')

@section('content')
<section class="inner-section">
    <div class="wrap appointment-page">
        @if(session('appointment_success'))
            <div class="form-success" role="status"><i>✓</i><h2>Thank you.</h2><p>Your appointment request has been received. Our team will contact you shortly.</p><a class="btn btn-primary" href="{{ route('home') }}">Back to home</a></div>
        @else
            @if($errors->any())<div class="form-error" role="alert">{{ $errors->first() }}</div>@endif
            <form class="appointment-form appointment-page-form" method="post" action="{{ route('appointments.store') }}">
                @csrf
                <label><span>Patient Name *</span><input name="name" autocomplete="name" maxlength="80" required value="{{ old('name') }}" placeholder="Your full name"></label>
                <label><span>Mobile Number *</span><input name="phone" type="tel" autocomplete="tel" inputmode="numeric" maxlength="18" required value="{{ old('phone') }}" placeholder="10-digit mobile number"></label>
                <label><span>Email <small>(optional)</small></span><input name="email" type="email" autocomplete="email" value="{{ old('email') }}" placeholder="you@example.com"></label>
                <label><span>Service *</span><select name="speciality" required><option value="">Select service</option>@foreach(['Orthopaedics','Robotic Joint Replacement','Infertility & IVF','Trauma','Other'] as $service)<option @selected(old('speciality') === $service)>{{ $service }}</option>@endforeach</select></label>
                <label><span>Preferred Doctor <small>(optional)</small></span><select name="doctor"><option value="">Any available doctor</option>@foreach(['Dr. Amit Bhutani','Dr. Puja Bhutani','Dr. Deepak Gupta','Dr. Gunjan Gupta','Dr. Sachin Thakral'] as $doctor)<option @selected(old('doctor') === $doctor)>{{ $doctor }}</option>@endforeach</select></label>
                <label><span>Preferred Date</span><input name="date" type="date" min="{{ now()->toDateString() }}" value="{{ old('date') }}"></label>
                <label><span>Preferred Time</span><select name="time"><option value="">Select a time</option>@foreach(['Morning (10 AM–12 PM)','Afternoon (12–3 PM)'] as $time)<option @selected(old('time') === $time)>{{ $time }}</option>@endforeach</select></label>
                <label class="full"><span>Message / Concern</span><textarea name="message" maxlength="800" placeholder="Briefly tell us how we can help">{{ old('message') }}</textarea></label>
                <p class="privacy-note full">By submitting, you consent to being contacted about this appointment request.</p>
                <button class="btn btn-primary full submit-btn" type="submit">Submit Appointment Request <span>→</span></button>
            </form>
        @endif
    </div>
</section>
@endsection
