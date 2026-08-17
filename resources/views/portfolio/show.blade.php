@extends('layouts.app')

@section('title', optional($portfolio)->title . ' - HeroBiz Bootstrap Template')

@section('body_class', 'portfolio-detail-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">{{ optional($portfolio)->title }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                    <li class="current">{{ optional($portfolio)->title }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

        <div class="container" data-aos="fade-up">

            <div class="portfolio-details-slider swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        }
                    }
                </script>
                <div class="swiper-wrapper align-items-center">

                    <div class="swiper-slide">
                        <img src="{{ asset(optional($portfolio)->image ?? 'assets/img/portfolio/app-1.jpg') }}" alt="{{ optional($portfolio)->title }}">
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="row justify-content-between gy-4 mt-4">

                <div class="col-lg-8">
                    <div class="portfolio-description">
                        <h2>{{ optional($portfolio)->title }}</h2>

                        @if(optional(optional($portfolio)->category)->name)
                        <div class="portfolio-category mb-3">
                            <span class="badge bg-primary">{{ $portfolio->category->name }}</span>
                        </div>
                        @endif

                        <p>
                            {!! optional($portfolio)->description !!}
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project Information</h3>
                        <ul>
                            <li><strong>Category:</strong> {{ optional(optional($portfolio)->category)->name ?? 'N/A' }}</li>
                            <li><strong>Client:</strong> {{ optional($portfolio)->client ?? 'N/A' }}</li>
                            <li><strong>Project Date:</strong> {{ optional($portfolio)->created_at)?->format('M d, Y') ?? 'N/A' }}</li>
                            <li><strong>Project URL:</strong> <a href="{{ $portfolio->url ?? '#' }}">{{ $portfolio->url ?? 'N/A' }}</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Portfolio Details Section -->

    <!-- Related Portfolios Section -->
    @if(optional($relatedPortfolios)->count())
    <section id="related-portfolios" class="related-portfolios section">

        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Related Projects</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>

            <div class="row gy-4">

                @foreach($relatedPortfolios as $related)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset(optional($related)->image ?? 'assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <a href="{{ asset(optional($related)->image ?? 'assets/img/portfolio/app-1.jpg') }}" data-gallery="portfolio-gallery-related" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="{{ route('portfolio.show', $related) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </section><!-- /Related Portfolios Section -->
    @endif
@endsection
