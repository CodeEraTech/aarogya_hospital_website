@extends('layouts.admin')

@section('title', 'Settings')
@section('heading', 'Website settings')

@section('content')
<div class="page-toolbar">
    <div>
        <p class="muted">Manage SEO, branding, contact, and social media settings.</p>
    </div>
</div>

<form method="post" enctype="multipart/form-data" action="{{ route('admin.settings.save') }}">
    @csrf
    @method('PUT')

    @php($socialLabels = ['social_facebook' => 'Facebook', 'social_instagram' => 'Instagram', 'social_linkedin' => 'LinkedIn', 'social_youtube' => 'YouTube', 'social_whatsapp' => 'WhatsApp'])
    @forelse($groups as $group => $settings)
        <section class="panel settings-panel">
            <div class="panel-head">
                <div><p class="eyebrow">CONFIGURATION</p><h3>{{ $group }}</h3></div>
            </div>
            <div class="settings-grid">
                @foreach($settings as $setting)
                    @php($settingLabel = $socialLabels[$setting->key] ?? ucwords(str_replace(['_', '-'], ' ', $setting->key)))
                    <label>
                        <span>{{ $settingLabel }}</span>
                        @if(in_array($setting->key, ['website_logo', 'website_favicon']))
                            <input type="file" name="settings_files[{{ $setting->key }}]" accept="{{ $setting->key === 'website_favicon' ? '.ico,.png,.jpg,.jpeg' : 'image/*' }}">
                            @if($setting->value && is_file(public_path($setting->value)) && filesize(public_path($setting->value)) > 0)
                                <img class="setting-preview {{ $setting->key === 'website_favicon' ? 'favicon' : '' }}" src="{{ asset($setting->value) }}" alt="Current {{ $settingLabel }}">
                            @endif
                        @elseif($setting->key === 'footer_about')
                            <textarea name="settings[{{ $setting->key }}]" rows="5" placeholder="Enter footer about text">{{ $setting->value }}</textarea>
                        @else
                            <input type="{{ str_starts_with($setting->key, 'social_') ? 'url' : 'text' }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" placeholder="{{ array_key_exists($setting->key, $socialLabels) ? 'Enter '.$settingLabel.' URL' : 'Enter '.strtolower($settingLabel) }}">
                        @endif
                    </label>
                @endforeach
            </div>
        </section>
    @empty
        <section class="panel empty">No settings have been configured.</section>
    @endforelse

    @if($groups->isNotEmpty())
        <div class="form-actions"><button class="button button-primary">Save all settings</button></div>
    @endif
</form>
@endsection
