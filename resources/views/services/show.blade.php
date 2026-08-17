@extends('layouts.app')

@section('title', optional($service)->title . ' - HeroBiz Bootstrap Template')

@section('body_class', 'service-detail-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">{{ optional($service)->title }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('services.index') }}">Services</a></li>
                    <li class="current">{{ optional($service)->title }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-5">

                <div class="col-lg-8">
                    <div class="service-detail-content">
                        @if(optional($service)->image)
                        <div class="service-img mb-4">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="img-fluid">
                        </div>
                        @endif

                        <h2>{{ optional($service)->title }}</h2>

                        <div class="service-description mt-4">
                            {!! optional($service)->description !!}
                        </div>

                        @if(optional($service)->details && $service->details->count())
                        <div class="service-features mt-5">
                            <h3>Service Features</h3>
                            <div class="row gy-4 mt-3">
                                @foreach($service->details as $detail)
                                <div class="col-md-6">
                                    <div class="feature-item d-flex">
                                        <div class="icon me-3">
                                            <i class="{{ optional($detail)->icon ?? 'bi bi-check-circle' }}" style="font-size: 2rem; color: #4154f1;"></i>
                                        </div>
                                        <div>
                                            <h4>{{ optional($detail)->title }}</h4>
                                            <p>{{ optional($detail)->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Service Info -->
                        <div class="sidebar-item">
                            <h3 class="sidebar-title">Service Info</h3>
                            <div class="sidebar-content">
                                <ul class="list-unstyled">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bi bi-check-circle-fill me-2" style="color: #4154f1;"></i>
                                        <span>Professional Team</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bi bi-check-circle-fill me-2" style="color: #4154f1;"></i>
                                        <span>24/7 Support</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bi bi-check-circle-fill me-2" style="color: #4154f1;"></i>
                                        <span>Quality Results</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bi bi-check-circle-fill me-2" style="color: #4154f1;"></i>
                                        <span>Fast Delivery</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Related Services -->
                        @if(optional($relatedServices)->count())
                        <div class="sidebar-item mt-4">
                            <h3 class="sidebar-title">Related Services</h3>
                            <div class="sidebar-content">
                                @foreach($relatedServices as $related)
                                <div class="post-item d-flex mb-3">
                                    @if(optional($related)->image)
                                    <img src="{{ asset($related->image) }}" alt="{{ $related->title }}" class="img-fluid flex-shrink-0" style="width: 80px; height: 60px; object-fit: cover;">
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{ route('services.show', $related) }}" class="text-decoration-none">{{ $related->title }}</a></h6>
                                        <p class="mb-0 small text-muted">{{ Str::limit(strip_tags($related->description), 60) }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Service Details Section -->
@endsection
