@extends('layouts.app')

@section('title', $post->title . ' - HeroBiz Bootstrap Template')

@section('body_class', 'blog-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Blog Details</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="current">{{ $post->title }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="{{ asset($post->featured_image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $post->title }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{ $post->author->name }}</li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> @if($post->published_at) <time datetime="{{ $post->published_at->toDateTimeString() }}">{{ $post->published_at->format('M j, Y') }}</time> @else <span>No date</span> @endif</li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> {{ $post->comments()->count() }} Comments</li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $post->content !!} {!!-- This assumes the content is trusted HTML from the CMS, otherwise use {{ $post->content }} --!!}
                            </div><!-- End content -->

                            @if(count($comments) > 0)
                                <div class="comments">

                                    <h4 class="comments-title">
                                        <span>{{ count($comments) }}</span> Comments
                                    </h4>

                                    @foreach($comments as $comment)
                                        <div class="comment">
                                            <div class="d-flex">
                                                <div class="comment-img"><img src="{{ asset('assets/img/blog/blog-author.jpg') }}" alt=""></div>
                                                <div class="comment-body">
                                                    <h5>{{ $comment->name }}</h5>
                                                    <p class="comment-date"><time datetime="{{ $comment->created_at->toDateTimeString() }}">{{ $comment->created_at->format('M j, Y \a\t g:i A') }}</time></p>
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div><!-- End comments -->
                            @endif

                            @if(count($relatedPosts) > 0)
                                <div class="related-posts">

                                    <h4 class="related-title">Related Posts</h4>

                                    <div class="row">

                                        @foreach($relatedPosts as $related)
                                            <div class="col-lg-4">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ asset($related->featured_image) }}" alt="" class="img-fluid">
                                                    </div>

                                                    <h2 class="title"><a href="{{ route('blog.show', $related) }}">{{ $related->title }}</a></h2>

                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/blog/blog-author.jpg') }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                                                        <div class="post-meta">
                                                            <p class="post-author">{{ $related->author->name }}</p>
                                                            <p class="post-date"><time datetime="{{ $related->published_at->toDateTimeString() }}">{{ $related->published_at->format('M j, Y') }}</time></p>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach

                                    </div>

                                </div><!-- End related posts -->
                            @endif

                        </article>

                    </div>
                </section><!-- End Blog Details Section -->

            </div>

            <div class="col-lg-4">

                <!-- Sidebar Section -->
                <section id="sidebar" class="sidebar section">

                    <!-- Recent Posts Section -->
                    <div class="widget-sidebar">
                        <h4 class="widget-title">Recent Posts</h4>
                        <div class="widget-body">
                            @foreach(BlogPost::published()->take(5)->get() as $recent)
                                <div class="post-item">
                                    <img src="{{ asset($recent->featured_image) }}" alt="" class="img-fluid">
                                    <h5><a href="{{ route('blog.show', $recent) }}">{{ $recent->title }}</a></h5>
                                    <p><time datetime="{{ $recent->published_at->toDateTimeString() }}">{{ $recent->published_at->format('M j, Y') }}</time></p>
                                </div>
                            @endforeach
                        </div>
                    </div><!-- End sidebar recent posts-->

                    <!-- Tags Section -->
                    <div class="widget-sidebar">
                        <h4 class="widget-title">Tags</h4>
                        <div class="widget-body">
                            @foreach($post->tags as $tag)
                                <a href="#" class="post-tag">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div><!-- End sidebar tags-->

                </section><!-- End Sidebar Section-->

            </div>

        </div>
    </div>
@endsection