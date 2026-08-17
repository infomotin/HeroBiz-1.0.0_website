@extends('layouts.app')

@section('title', 'Services - HeroBiz Bootstrap Template')

@section('body_class', 'services-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Services</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Services</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                @foreach($services as $service)
                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ ($loop->iteration + 1) * 100 }}">
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset(optional($service)->image ?? 'assets/img/services-1.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="{{ optional($service)->icon ?? 'bi bi-activity' }}"></i>
                            </div>
                            <a href="{{ route('services.show', $service) }}" class="stretched-link">
                                <h3>{{ optional($service)->title }}</h3>
                            </a>
                            <p>{{ optional($service)->description }}</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->
                @endforeach

            </div>

        </div>

    </section><!-- /Services Section -->
@endsection
