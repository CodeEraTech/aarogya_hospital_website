@extends('layouts.site')

@section('title', 'Hospital Blogs | Aarogya Hospital')
@section('heading', 'Hospital Blogs')
@section('intro', 'Helpful guidance, hospital updates, and trusted health information from our care team.')

@section('content')
<section class="inner-section">
    <div class="wrap">
        <div class="blog-directory">
            @forelse($blogs as $blog)
                <article class="blog-card">
                    @if($blog->image)<a href="{{ route('blogs.show', $blog->slug) }}"><img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" loading="lazy"></a>@endif
                    <div class="blog-card-body">
                        @if($blog->published_at)<time datetime="{{ $blog->published_at->toDateString() }}">{{ $blog->published_at->format('d M Y') }}</time>@endif
                        <h2><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 145) }}</p>
                        <a class="blog-card-link" href="{{ route('blogs.show', $blog->slug) }}">Read article <span aria-hidden="true">→</span></a>
                    </div>
                </article>
            @empty
                <div class="empty-state"><h2>Blogs coming soon</h2><p>Our care team is preparing helpful information for you.</p></div>
            @endforelse
        </div>
        <div class="blog-pagination" aria-label="Blog pagination">{{ $blogs->links() }}</div>
    </div>
</section>
@endsection
