@extends('layouts.app')

@section('content')
    <div class="section post-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image"
                            class="author-pic img-fluid rounded-circle mx-auto">
                    </div>
                    <span class="d-block text-center">{{ $post->user->name }}</span>
                    <span
                        class="date d-block text-center small text-uppercase text-black-50 mb-5">{{ $post->getFormattedDate() }}</span>
                    <h2 class="heading text-center">{{ $post->title }}
                    </h2>
                    {{ $post->body }}
                    <div class="row mt-5 pt-5 border-top">
                        <div class="col-12">
                            <span class="fw-bold text-black small mb-1">Share</span>
                            <ul class="social list-unstyled">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="heading">Related</h2>
                </div>
            </div>
            @foreach ($relatedPosts as $relatedPost)
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="post-entry d-md-flex small-horizontal mb-5">
                            <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                <img src="{{ $relatedPost->getThumbnail() }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="content">
                                <div class="post-meta mb-3">
                                    <a href="#" class="category">{{ $relatedPost->category->title }}</a> &mdash;
                                    <span class="date">{{ $relatedPost->getFormattedDate() }}</span>
                                </div>
                                <h2 class="heading"><a
                                        href="{{ route('post.show', $relatedPost) }}">{{ $relatedPost->title }}</a></h2>
                                <p>{{ $relatedPost->shortBody() }}</p>
                                <a href="#" class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image">
                                    </div>
                                    <div class="text">
                                        <strong>{{ $relatedPost->user->name }}</strong>
                                        <span>Author, 26 published post</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
