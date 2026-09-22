@extends('layouts.site')
@section('title', 'Gallery')
@section('heading', 'Aarogya Hospital Gallery')
@section('intro', 'A glimpse of our hospital, care team, and patient-focused facilities in Hisar.')
@section('content')
<section class="inner-section">
    <div class="wrap">
        <div class="gallery-intro"><span class="eyebrow">OUR HOSPITAL</span>
            <h2>Care, technology, and human connection.</h2>
            <p>Explore moments from Aarogya Hospital. Select an image to view it in detail.</p>
        </div>
        <div class="hospital-gallery" aria-label="Aarogya Hospital image gallery">
            @foreach($galleryItems as $index => $item)
            <button class="gallery-item" type="button" data-gallery-image="{{ asset($item->image) }}" data-gallery-alt="{{ $item->title }}"><img src="{{ asset($item->image) }}" alt="{{ $item->title }}" width="1200" height="900" loading="lazy"></button>
            @endforeach
        </div>
    </div>
</section>
<dialog class="gallery-dialog" aria-label="Gallery image viewer"><button type="button" data-close-gallery aria-label="Close image viewer">×</button><img src="" alt=""></dialog>
@push('scripts')<script>
    const galleryDialog = document.querySelector('.gallery-dialog');
    const galleryImage = galleryDialog?.querySelector('img');
    document.querySelectorAll('[data-gallery-image]').forEach(button => button.addEventListener('click', () => {
        if (galleryDialog && galleryImage) {
            galleryImage.src = button.dataset.galleryImage;
            galleryImage.alt = button.dataset.galleryAlt;
            galleryDialog.showModal()
        }
    }));
    document.querySelector('[data-close-gallery]')?.addEventListener('click', () => galleryDialog?.close());
    galleryDialog?.addEventListener('click', event => {
        if (event.target === galleryDialog) {
            galleryDialog.close()
        }
    });
</script>@endpush
@endsection