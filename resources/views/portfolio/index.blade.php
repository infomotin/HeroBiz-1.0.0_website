@extends('layouts.app')

@section('title', 'Portfolio - HeroBiz Bootstrap Template')

@section('body_class', 'portfolio-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Portfolio</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Portfolio</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <div class="container-fluid">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    @if(optional($categories)->count())
                        @foreach($categories as $category)
                        <li data-filter=".filter-{{ $category->slug }}">{{ $category->name }}</li>
                        @endforeach
                    @endif
                </ul><!-- End Portfolio Filters -->

                <div class="row g-0 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @foreach($portfolios as $portfolio)
                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ optional(optional($portfolio)->category)->slug ?? 'all' }}">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset(optional($portfolio)->image ?? 'assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset(optional($portfolio)->image ?? 'assets/img/portfolio/app-1.jpg') }}" data-gallery="portfolio-gallery-{{ optional(optional($portfolio)->category)->slug ?? 'app' }}" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="{{ route('portfolio.show', $portfolio) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                    @endforeach

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection
