@props(['value' => null])
@php($phoneLinks = \App\Support\PhoneNumbers::parse($value))
@if($phoneLinks)
<span {{ $attributes->class(['phone-links']) }}>
    @foreach($phoneLinks as $phoneLink)
    <a class="phone-link" href="{{ $phoneLink['href'] }}" aria-label="Call {{ $phoneLink['label'] }}">{{ $phoneLink['label'] }}</a>
    @endforeach
</span>
@endif
