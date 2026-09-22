@extends('layouts.site')

@section('title', $blog->meta_title ?: $blog->title.' | Aarogya Hospital')
@section('description', $blog->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 160))
@section('heading', $blog->title)
@section('intro', $blog->meta_description ?: 'Health information and updates from Aarogya Hospital.')

@section('content')
<article class="inner-section">
    <div class="wrap detail-layout">
        <div class="detail-main">
            <a class="back-link" href="{{ route('blogs.index') }}">← Back to Blogs</a>
            @if($blog->published_at)<time class="blog-detail-date" datetime="{{ $blog->published_at->toDateString() }}">{{ $blog->published_at->format('d M Y') }}</time>@endif
            <div class="detail-content">{!! $blog->content !!}</div>
        </div>

        <aside class="detail-sidebar">
            {{-- Related Blogs --}}
            @if($relatedBlogs->count() > 0)
            <div class="sidebar-box">
                <h3>Related Articles</h3>
                <div class="related-list">
                    @foreach($relatedBlogs as $related)
                    <a href="{{ route('blogs.show', $related->slug) }}" class="related-item">
                        @if($related->image)
                        <img src="{{ asset($related->image) }}" alt="{{ $related->title }}">
                        @endif
                        <div>
                            <h4>{{ $related->title }}</h4>
                            @if($related->published_at)
                            <time>{{ $related->published_at->format('M d, Y') }}</time>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- CTA Box --}}
            <aside class="priority">
                <h2>Your Health<br>Our Priority</h2>
                <p>Arrange a consultation with our specialist team.</p>
                <button class="btn btn-light" type="button" data-open-appointment>Book an Appointment <span>→</span></button>
            </aside>
        </aside>
    </div>
</article>
@endsection
