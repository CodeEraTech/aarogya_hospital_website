@extends('layouts.site')

@section('title', $blog->meta_title ?: $blog->title.' | Aarogya Hospital')
@section('description', $blog->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 160))
@section('heading', $blog->title)
@section('intro', $blog->meta_description ?: 'Health information and updates from Aarogya Hospital.')

@section('content')
<article class="inner-section blog-detail">
    <div class="wrap">
        <a class="back-link" href="{{ route('blogs.index') }}">← Back to Blogs</a>
        @if($blog->image)<img class="blog-detail-image" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">@endif
        @if($blog->published_at)<time class="blog-detail-date" datetime="{{ $blog->published_at->toDateString() }}">{{ $blog->published_at->format('d M Y') }}</time>@endif
        <div class="blog-detail-content">{!! $blog->content !!}</div>
    </div>
</article>
@endsection
