@extends('layouts.site')
@section('title', 'Gallery')
@section('heading', 'Aarogya Hospital Gallery')
@section('intro', 'A glimpse of our hospital, care team, and patient-focused facilities in Hisar.')
@section('content')
<section class="inner-section"><div class="wrap">
    <div class="gallery-intro"><span class="eyebrow">OUR HOSPITAL</span><h2>Care, technology, and human connection.</h2><p>Explore moments from Aarogya Hospital. Select an image to view it in detail.</p></div>
    <div class="hospital-gallery" aria-label="Aarogya Hospital image gallery">
@foreach(['gallery-01.png', 'gallery-02.jpg', 'gallery-03.png', 'gallery-04.jpg', 'gallery-05.png', 'gallery-06.jpg', 'gallery-07.jpg', 'gallery-08.jpg', 'gallery-09.jpg', 'gallery-10.jpg', 'gallery-11.jpg', 'gallery-12.jpg'] as $index => $filename)
        <button class="gallery-item" type="button" data-gallery-image="{{ asset('assets/hospital/images/'.$filename) }}" data-gallery-alt="Aarogya Hospital gallery image {{ $index + 1 }}"><img src="{{ asset('assets/hospital/images/'.$filename) }}" alt="Aarogya Hospital gallery image {{ $index + 1 }}" width="1200" height="900" loading="lazy"><span>View image</span></button>
@endforeach
    </div>
</div></section>
<dialog class="gallery-dialog" aria-label="Gallery image viewer"><button type="button" data-close-gallery aria-label="Close image viewer">×</button><img src="" alt=""></dialog>
@push('scripts')<script>const galleryDialog=document.querySelector('.gallery-dialog');const galleryImage=galleryDialog?.querySelector('img');document.querySelectorAll('[data-gallery-image]').forEach(button=>button.addEventListener('click',()=>{if(galleryDialog&&galleryImage){galleryImage.src=button.dataset.galleryImage;galleryImage.alt=button.dataset.galleryAlt;galleryDialog.showModal()}}));document.querySelector('[data-close-gallery]')?.addEventListener('click',()=>galleryDialog?.close());galleryDialog?.addEventListener('click',event=>{if(event.target===galleryDialog){galleryDialog.close()}});</script>@endpush
@endsection
