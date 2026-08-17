@extends('layouts.app')

@section('title', 'Blog - HeroBiz Bootstrap Template')

@section('body_class', 'blog-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Blog</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Blog</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
        <div class="container">
            <div class="row gy-4">
                @foreach ($posts as $post)
                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="{{ asset($post->featured_image) }}" alt="" class="img-fluid">
                            </div>

                            <p class="post-category">{{ $post->category->name }}</p>

                            <h2 class="title">
                                <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/blog/blog-author.jpg') }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">{{ $post->author->name }}</p>
                                    <p class="post-date">
                                        <time datetime="{{ $post->published_at->toDateTimeString() }}">{{ $post->published_at->format('M j, Y') }}</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">
        <div class="container">
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection