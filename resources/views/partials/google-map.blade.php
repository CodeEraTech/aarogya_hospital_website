@if(!empty($siteSettings['google_maps_embed_url']))
<section class="map-section" aria-labelledby="map-title">
    <div class="wrap map-layout">
        <div class="map-copy">
            <span class="eyebrow">VISIT AAROGYA HOSPITAL</span>
            <h2 id="map-title">Find us in Hisar</h2>
            <p>{{ $siteSettings['address'] ?? 'Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001.' }}</p>
        </div>
        <div class="map-frame">
            <iframe src="{{ $siteSettings['google_maps_embed_url'] }}" title="Aarogya Hospital location map" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</section>
@endif
