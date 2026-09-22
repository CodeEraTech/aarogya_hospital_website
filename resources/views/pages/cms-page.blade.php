@extends('layouts.site')

@section('title', $page->title.' | Aarogya Hospital')
@section('heading', $page->title)
@section('intro', 'Information from Aarogya Hospital.')

@section('content')
<article class="inner-section cms-page">
    <div class="wrap cms-page-content">{!! $page->content !!}</div>
</article>
@endsection
