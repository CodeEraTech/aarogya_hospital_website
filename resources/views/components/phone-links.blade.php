@props(['value' => null, 'inline' => false])
@php($phoneLinks = \App\Support\PhoneNumbers::parse($value))
@if($phoneLinks)
<span {{ $attributes->class(['phone-links', 'phone-links--inline' => $inline]) }}>
    @foreach($phoneLinks as $phoneLink)
    <a class="phone-link" href="{{ $phoneLink['href'] }}" aria-label="Call {{ $phoneLink['label'] }}">{{ $phoneLink['label'] }}</a>@if($inline && ! $loop->last)<span class="phone-link-separator">,</span>@endif
    @endforeach
</span>
@endif
