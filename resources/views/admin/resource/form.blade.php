@extends('layouts.admin')

@section('title', $item ? 'Edit '.$label : 'Add '.$label)
@section('heading', $item ? 'Edit '.$label : 'Add '.$label)

@section('content')
<div class="form-page">
    <a class="back-link" href="{{ route('admin.resource.index', $resource) }}">← Back to {{ $label }}</a>
    <section class="panel form-panel">
        <form method="post" enctype="multipart/form-data" action="{{ $item ? route('admin.resource.update', [$resource, $item->id]) : route('admin.resource.store', $resource) }}">
            @csrf
            @if($item) @method('PUT') @endif
            <div class="form-grid">
                @foreach($fields as $field)
                    @if($field !== 'slug' && !($resource === 'appointments' && $field === 'reference'))
                        @php($long = in_array($field, ['content', 'bio', 'description', 'excerpt', 'message', 'subtitle']) && !($resource === 'specialities' && $field === 'description'))
                        @php($file = $field === 'image')
                        @php($testimonialField = $resource === 'testimonials' && in_array($field, ['type', 'quote', 'video_file', 'video_url']))
                        @php($wide = $long || $field === 'meta_description' || ($resource === 'specialities' && $field === 'description') || ($resource === 'blogs' && in_array($field, ['meta_title', 'meta_description'])) || ($resource === 'blogs' && $field === 'title') || ($testimonialField && $field !== 'type'))
                        @php($required = in_array($field, ['name', 'title', 'key', 'content']) || ($resource === 'specialities' && $field === 'image' && !$item))
                        <label class="{{ $wide ? 'wide' : '' }} {{ $testimonialField ? 'testimonial-field testimonial-'.$field : '' }}">
                            <span>{{ $field === 'type' ? 'Testimonial type' : ($field === 'speciality_id' ? 'Speciality' : ($resource === 'specialities' && $field === 'description' ? 'Short Description' : ($resource === 'specialities' && $field === 'image' ? 'Featured Image' : ($resource === 'specialities' && $field === 'meta_tags' ? 'Meta Tags' : ucwords(str_replace('_', ' ', $field)))))) }} @if($required || ($resource === 'doctors' && $field === 'speciality_id'))<b class="required">*</b>@endif</span>
                            @if($resource === 'doctors' && $field === 'speciality_id')
                                <select name="speciality_id" required>
                                    <option value="">Select speciality</option>
                                    @foreach($specialities ?? [] as $speciality)
                                        <option value="{{ $speciality->id }}" @selected((string) old('speciality_id', $item?->{$field}) === (string) $speciality->id)>{{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                            @elseif($resource === 'testimonials' && $field === 'type')
                                <select name="type" class="testimonial-type">
                                    <option value="Text" @selected(old('type', $item?->{$field} ?? 'Text') === 'Text')>Text testimonial</option>
                                    <option value="File" @selected(old('type', $item?->{$field}) === 'File')>Video file</option>
                                    <option value="Video Link" @selected(old('type', $item?->{$field}) === 'Video Link')>Video link</option>
                                </select>
                            @elseif($resource === 'testimonials' && $field === 'video_file')
                                <input type="file" name="video_file" accept="video/mp4,video/webm,video/ogg,video/quicktime">
                                @if($item?->{$field})<small class="muted">Current video uploaded</small>@endif
                            @elseif($resource === 'testimonials' && $field === 'video_url')
                                <input type="url" name="video_url" value="{{ old($field, $item?->{$field}) }}" placeholder="Enter video URL">
                            @elseif($file)
                                <input type="file" name="{{ $field }}" accept="image/jpeg,image/png,image/webp,image/gif" {{ $required ? 'required' : '' }}>
                                @if($item?->{$field})<img class="file-preview" src="{{ asset($item->{$field}) }}" alt="Current image">@endif
                            @elseif($resource === 'specialities' && $field === 'description')
                                <textarea name="description" rows="5" maxlength="1000" placeholder="Enter a brief summary for the speciality card.">{{ old($field, $item?->{$field}) }}</textarea>
                            @elseif($resource === 'testimonials' && $field === 'quote')
                                <textarea name="quote" rows="7">{{ old($field, $item?->{$field}) }}</textarea>
                            @elseif($resource === 'appointments' && $field === 'preferred_doctor')
                                <select name="preferred_doctor"><option value="">Any available specialist</option>@foreach($activeDoctors ?? [] as $doctor)<option value="{{ $doctor->name }}" @selected(old('preferred_doctor', $item?->{$field}) === $doctor->name)>{{ $doctor->name }} — {{ $doctor->designation }}</option>@endforeach</select>
                            @elseif($resource === 'appointments' && $field === 'preferred_date')
                                <input type="date" name="preferred_date" value="{{ old('preferred_date', optional($item?->{$field})->format('Y-m-d')) }}">
                            @elseif($resource === 'appointments' && $field === 'preferred_time')
                                <input type="time" name="preferred_time" value="{{ old('preferred_time', $item?->{$field}) }}">
                            @elseif($resource === 'blogs' && $field === 'published_at')
                                <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($item?->{$field})->format('Y-m-d\TH:i')) }}">
                            @elseif($long)
                                <textarea class="rich-text-source" name="{{ $field }}" rows="12">{{ old($field, $item?->{$field}) }}</textarea>
                            @elseif($field === 'meta_title')
                                <input type="text" name="meta_title" value="{{ old($field, $item?->{$field}) }}">
                            @elseif($field === 'meta_tags')
                                <input type="text" name="meta_tags" value="{{ old($field, $item?->{$field}) }}" placeholder="e.g. orthopaedics, joint replacement, Hisar">
                            @elseif($field === 'meta_description')
                                <textarea name="meta_description" rows="5">{{ old($field, $item?->{$field}) }}</textarea>
                            @elseif($field === 'status')
                                <select name="status">@foreach($statusOptions as $status)<option value="{{ $status }}" @selected(old('status', $item?->{$field} ?? ($resource === 'appointments' || $resource === 'feedback' ? 'New' : 'Active')) === $status)>{{ $status }}</option>@endforeach</select>
                            @else
                                <input name="{{ $field }}" value="{{ old($field, $item?->{$field}) }}" {{ $required ? 'required' : '' }}>
                            @endif
                        </label>
                    @endif
                @endforeach
            </div>
            <div class="form-actions"><button class="button button-primary">{{ $item ? 'Update' : 'Save' }} {{ rtrim($label, 's') }}</button></div>
        </form>
    </section>
</div>
@if($resource === 'testimonials')
<script>document.addEventListener('DOMContentLoaded',function(){var type=document.querySelector('select.testimonial-type');var fields={Text:document.querySelector('label.testimonial-quote'),File:document.querySelector('label.testimonial-video_file'),'Video Link':document.querySelector('label.testimonial-video_url')};function toggle(){Object.keys(fields).forEach(function(key){if(fields[key])fields[key].style.display=type.value===key?'grid':'none'});var quote=fields.Text&&fields.Text.querySelector('textarea');if(quote)quote.required=type.value==='Text'}if(type){type.addEventListener('change',toggle);toggle()}});</script>
@endif
@if($resource === 'gallery')
<script>document.addEventListener('DOMContentLoaded',function(){var title=document.querySelector('input[name="title"]')?.closest('label');title?.querySelector('.required')?.remove();title?.querySelector('input')?.removeAttribute('required');var image=document.querySelector('input[type="file"][name="image"]');if(image&&!{{ $item ? 'true' : 'false' }})image.required=true});</script>
@endif
@endsection
