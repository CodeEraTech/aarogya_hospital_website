@extends('layouts.admin')
@section('title', $section['name'])
@section('heading', $section['name'])
@section('content')
<div class="form-page">
    <div class="page-toolbar"><p class="muted">Manage content and partner images for {{ $section['name'] }}.</p></div>
    <section class="panel form-panel">
        @if($record->images)
            <div class="uploaded-images"><span>Current images</span><div class="uploaded-image-grid">
                @foreach($record->images as $index => $image)
                    <div class="uploaded-image"><img src="{{ asset($image) }}" alt="Uploaded partner image"><form method="post" action="{{ route('admin.empanelled.image.destroy', [$record, $index]) }}" class="delete-form" data-delete-label="this partner image">@csrf @method('DELETE')<button type="submit" title="Remove image" aria-label="Remove image"><i class="fa fa-trash"></i></button></form></div>
                @endforeach
            </div></div>
        @endif
        <form id="empanelled-form" method="post" enctype="multipart/form-data" action="{{ route('admin.empanelled.update', $key) }}">
            @csrf @method('PUT')
            <div class="form-grid">
                <label class="wide"><span>Content</span><textarea class="rich-text-source" name="content" rows="16" placeholder="Add information for this section...">{{ old('content', $record->content) }}</textarea></label>
                <div class="wide form-field"><span>Partner images</span><div id="empanelled-dropzone" class="dropzone-manual"><div class="dz-message"><i class="fa fa-cloud-upload"></i><strong>Drop images here or click to browse</strong><small>Upload multiple JPG, PNG, WEBP, GIF, or SVG images</small></div></div><input id="empanelled-images" type="file" name="images[]" accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml" multiple hidden></div>
            </div>
            <div class="form-actions"><button class="button button-primary">Save {{ $section['name'] }}</button></div>
        </form>
    </section>
</div>
@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css">
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>
<script>document.addEventListener('DOMContentLoaded',function(){Dropzone.autoDiscover=false;var form=document.getElementById('empanelled-form'),zone=document.getElementById('empanelled-dropzone'),input=document.getElementById('empanelled-images'),dz=new Dropzone(zone,{url:'{{ route('admin.empanelled.update', $key) }}',autoProcessQueue:false,clickable:true,previewsContainer:zone,acceptedFiles:'image/jpeg,image/png,image/webp,image/gif,image/svg+xml',addRemoveLinks:true});zone.addEventListener('click',function(event){if(!event.target.closest('.dz-remove')&&!event.target.closest('.dz-preview'))dz.hiddenFileInput.click()});form.addEventListener('submit',function(){var files=new DataTransfer();dz.files.filter(function(file){return file.accepted!==false}).forEach(function(file){files.items.add(file)});input.files=files.files})});</script>
<script>document.addEventListener('DOMContentLoaded',function(){var zone=document.getElementById('empanelled-dropzone');if(!zone)return;var refresh=function(){var previews=zone.querySelectorAll('.dz-preview');var message=zone.querySelector('.dz-message');if(message)message.style.display=previews.length?'none':'';previews.forEach(function(preview){if(preview.querySelector('.manual-remove'))return;var button=document.createElement('button');button.type='button';button.className='manual-remove';button.title='Remove selected image';button.setAttribute('aria-label','Remove selected image');button.innerHTML='<i class="fa fa-trash"></i>';button.addEventListener('click',function(event){event.preventDefault();event.stopPropagation();preview.querySelector('.dz-remove')?.click()});preview.appendChild(button)})};new MutationObserver(refresh).observe(zone,{childList:true,subtree:true});refresh()});</script>
@endpush
@endsection
