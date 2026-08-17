@extends('layouts.app')

@section('title', 'Index - HeroBiz Bootstrap Template')

@section('body_class', 'index-page')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        @if(optional($hero)->image)
          <img src="{{ asset($hero->image) }}" class="img-fluid animated" alt="">
        @else
          <img src="{{ asset('assets/img/hero-img.svg') }}" class="img-fluid animated" alt="">
        @endif
        <h1>{!! optional($hero)->title ?? 'Welcome to <span>HeroBiz</span>' !!}</h1>
        <p>{{ optional($hero)->subtitle ?? 'Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.' }}</p>
        <div class="d-flex">
          @if(optional($hero)->btn_text)
            <a href="{{ $hero->btn_link ?? '#about' }}" class="btn-get-started scrollto">{{ $hero->btn_text }}</a>
          @else
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          @endif
          @if(optional($hero)->video_url)
            <a href="{{ $hero->video_url }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>{{ $hero->video_btn_text ?? 'Watch Video' }}</span></a>
          @else
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          @endif
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    @if(optional($featuredServices)->count())
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          @foreach($featuredServices as $index => $service)
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="service-item position-relative">
              <div class="icon"><i class="{{ optional($service)->icon ?? 'bi bi-activity' }} icon"></i></div>
              <h4><a href="{{ $service->link ?? '#' }}" class="stretched-link">{{ optional($service)->title ?? 'Service' }}</a></h4>
              <p>{{ optional($service)->description ?? '' }}</p>
            </div>
          </div><!-- End Service Item -->
          @endforeach

        </div>

      </div>

    </section><!-- /Featured Services Section -->
    @endif

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>{{ optional($aboutSection)->title ?? 'About Us' }}</h2>
        <p>{{ optional($aboutSection)->subtitle ?? 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit' }}</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">

        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-5">
            <div class="about-img">
              @if(optional($aboutSection)->image)
                <img src="{{ asset($aboutSection->image) }}" class="img-fluid" alt="">
              @else
                <img src="{{ asset('assets/img/about-portrait.jpg') }}" class="img-fluid" alt="">
              @endif
            </div>
          </div>

          <div class="col-lg-7">
            <h3 class="pt-0 pt-lg-5">{{ optional($aboutSection)->heading ?? 'Neque officiis dolore maiores et exercitationem quae est seda lidera pat claero' }}</h3>

            <!-- Tabs -->
            @if(optional($aboutTabs)->count())
            <ul class="nav nav-pills mb-3">
              @foreach($aboutTabs as $index => $tab)
              <li><a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#about-tab{{ $loop->iteration }}">{{ optional($tab)->title }}</a></li>
              @endforeach
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">

              @foreach($aboutTabs as $tab)
              <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="about-tab{{ $loop->iteration }}">
                <div class="content">{!! optional($tab)->content !!}</div>
              </div>
              @endforeach

            </div>
            @else
            <ul class="nav nav-pills mb-3">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#about-tab1">Saepe fuga</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab2">Voluptates</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab3">Corrupti</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane fade show active" id="about-tab1">
                <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                </div>
                <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim quaerat. Vero error error voluptatem eum.</p>
              </div>
              <div class="tab-pane fade" id="about-tab2">
                <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                </div>
                <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim quaerat. Vero error error voluptatem eum.</p>
              </div>
              <div class="tab-pane fade" id="about-tab3">
                <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>
                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                </div>
                <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim quaerat. Vero error error voluptatem eum.</p>
              </div>
            </div>
            @endif

          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->
    @if(optional($clients)->count())
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          @foreach($clients as $client)
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <a href="{{ $client->website ?? '#' }}" target="_blank">
              <img src="{{ asset($client->logo) }}" class="img-fluid" alt="{{ $client->name }}">
            </a>
          </div><!-- End Client Item -->
          @endforeach

        </div>

      </div>

    </section><!-- /Clients Section -->
    @endif

    <!-- Call To Action Section -->
    @if(optional($cta))
    <section id="call-to-action" class="call-to-action section">

      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3>{!! $cta->heading !!}</h3>
            <p>{{ $cta->description }}</p>
            <a class="cta-btn align-self-start" href="{{ $cta->btn_link ?? '#' }}">{{ $cta->btn_text ?? 'Call To Action' }}</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <div class="img">
              <img src="{{ asset($cta->image ?? 'assets/img/cta.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Call To Action Section -->
    @endif

    <!-- Onfocus Section -->
    @if(optional($onfocus))
    <section id="onfocus" class="onfocus section dark-background">

      <div class="container-fluid p-0" data-aos="fade-up">

        <div class="row g-0">
          @if(optional($onfocus)->video_url)
          <div class="col-lg-6 video-play position-relative">
            <a href="{{ $onfocus->video_url }}" class="glightbox pulsating-play-btn"></a>
          </div>
          @endif
          <div class="{{ optional($onfocus)->video_url ? 'col-lg-6' : 'col-lg-12' }}">
            <div class="content d-flex flex-column justify-content-center h-100">
              <h3>{{ $onfocus->heading ?? 'Voluptatem dignissimos provident quasi corporis' }}</h3>
              <p class="fst-italic">
                {{ $onfocus->description ?? '' }}
              </p>
              @if(optional($onfocus)->checklist_items && count($onfocus->checklist_items))
              <ul>
                @foreach($onfocus->checklist_items as $item)
                <li><i class="bi bi-check-circle"></i> {{ $item }}</li>
                @endforeach
              </ul>
              @else
              <ul>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              @endif
              <a href="{{ $onfocus->btn_link ?? '#' }}" class="read-more align-self-start"><span>{{ $onfocus->btn_text ?? 'Read More' }}</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Onfocus Section -->
    @endif

    <!-- Features Section -->
    @if(optional($features)->count())
    <section id="features" class="features section">

      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row gy-4 d-flex">
          @foreach($features as $feature)
          <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link {{ $loop->first ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#features-tab-{{ $loop->iteration }}">
              <i class="{{ optional($feature)->icon ?? 'bi bi-binoculars' }}" style="color: {{ optional($feature)->color ?? '#0dcaf0' }};"></i>
              <h4>{{ optional($feature)->title }}</h4>
            </a>
          </li><!-- End Tab Nav -->
          @endforeach
        </ul>

        <div class="tab-content">
          @foreach($features as $feature)
          <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="features-tab-{{ $loop->iteration }}">
            <div class="row gy-4">
              <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $feature->title }}</h3>
                @if(optional($feature)->content)
                <div class="content">{!! $feature->content !!}</div>
                @endif
                @if(optional($feature)->checklist_items && count($feature->checklist_items))
                <ul>
                  @foreach($feature->checklist_items as $item)
                  <li><i class="bi bi-check-circle-fill"></i> {{ $item }}</li>
                  @endforeach
                </ul>
                @endif
              </div>
              <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                @if(optional($feature)->image)
                  <img src="{{ asset($feature->image) }}" alt="" class="img-fluid">
                @endif
              </div>
            </div>
          </div><!-- End Tab Content -->
          @endforeach
        </div>

      </div>

    </section><!-- /Features Section -->
    @endif

    <!-- Services Section -->
    @if(optional($services)->count())
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

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
                <a href="{{ $service->link ?? route('services.show', $service) }}" class="stretched-link">
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
    @endif

    <!-- Testimonials Section -->
    @if(optional($testimonials)->count())
    <section id="testimonials" class="testimonials section dark-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <img src="{{ asset('assets/img/testimonials-bg.jpg') }}" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
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
          <div class="swiper-wrapper">

            @foreach($testimonials as $testimonial)
            <div class="swiper-slide">
              <div class="testimonial-item">
                @if(optional($testimonial)->image)
                  <img src="{{ asset($testimonial->image) }}" class="testimonial-img" alt="">
                @else
                  <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                @endif
                <h3>{{ optional($testimonial)->name }}</h3>
                <h4>{{ optional($testimonial)->role }}</h4>
                <div class="stars">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star-fill" {{ $i <= optional($testimonial)->rating ? '' : 'style="opacity:0.3"' }}></i>
                  @endfor
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>{{ optional($testimonial)->content }}</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->
    @endif

    <!-- Pricing Section -->
    @if(optional($pricings)->count())
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          @foreach($pricings as $pricing)
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ ($loop->iteration) * 200 }}">
            <div class="pricing-item {{ optional($pricing)->is_featured ? 'featured' : '' }}">

              <div class="pricing-header">
                <h3>{{ optional($pricing)->name }}</h3>
                <h4><sup>$</sup>{{ optional($pricing)->price }}<span> / {{ optional($pricing)->period ?? 'month' }}</span></h4>
              </div>

              <ul>
                @if(optional($pricing)->features && count($pricing->features))
                  @foreach($pricing->features as $feature)
                  <li><i class="bi bi-dot"></i> <span>{{ $feature }}</span></li>
                  @endforeach
                @endif
              </ul>

              <div class="text-center mt-auto">
                <a href="{{ $pricing->btn_link ?? '#' }}" class="buy-btn">{{ $pricing->btn_text ?? 'Buy Now' }}</a>
              </div>

            </div>
          </div><!-- End Pricing Item -->
          @endforeach

        </div>

      </div>

    </section><!-- /Pricing Section -->
    @endif

    <!-- Faq Section -->
    @if(optional($faqs)->count())
    <section id="faq" class="faq section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              @foreach($faqs as $faq)
              <div class="faq-item {{ $loop->first ? 'faq-active' : '' }}">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>{{ optional($faq)->question }}</h3>
                <div class="faq-content">
                  <p>{{ optional($faq)->answer }}</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
              @endforeach

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2">
            <img src="{{ asset('assets/img/faq.jpg') }}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->
    @endif

    <!-- Portfolio Section -->
    @if(optional($portfolios)->count())
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container-fluid">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            @if(optional($portfolioCategories)->count())
              @foreach($portfolioCategories as $category)
              <li data-filter=".filter-{{ $category->slug }}">{{ $category->name }}</li>
              @endforeach
            @endif
          </ul><!-- End Portfolio Filters -->

          <div class="row g-0 isotope-container" data-aos="fade-up" data-aos-delay="200">

            @foreach($portfolios as $portfolio)
            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ optional($portfolio->category)->slug ?? 'all' }}">
              <div class="portfolio-content h-100">
                <img src="{{ asset(optional($portfolio)->image ?? 'assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <a href="{{ asset(optional($portfolio)->image ?? 'assets/img/portfolio/app-1.jpg') }}" data-gallery="portfolio-gallery-{{ optional($portfolio->category)->slug ?? 'app' }}" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('portfolio.show', $portfolio) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            @endforeach

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->
    @endif

    <!-- Team Section -->
    @if(optional($teamMembers)->count())
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Team</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          @foreach($teamMembers as $member)
          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="{{ ($loop->iteration) * 200 }}">
            <div class="team-member">
              <div class="member-img">
                @if(optional($member)->image)
                  <img src="{{ asset($member->image) }}" class="img-fluid" alt="">
                @else
                  <img src="{{ asset('assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                @endif
              </div>
              <div class="member-info">
                <div class="social">
                  <a href="{{ optional($member)->twitter ?? '#' }}"><i class="bi bi-twitter-x"></i></a>
                  <a href="{{ optional($member)->facebook ?? '#' }}"><i class="bi bi-facebook"></i></a>
                  <a href="{{ optional($member)->instagram ?? '#' }}"><i class="bi bi-instagram"></i></a>
                  <a href="{{ optional($member)->linkedin ?? '#' }}"><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>{{ optional($member)->name }}</h4>
                <span>{{ optional($member)->role }}</span>
              </div>
            </div>
          </div><!-- End Team Member -->
          @endforeach

        </div>

      </div>

    </section><!-- /Team Section -->
    @endif

    <!-- Recent Posts Section -->
    @if(optional($recentPosts)->count())
    <section id="recent-posts" class="recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recent Blog Posts</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          @foreach($recentPosts as $post)
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration) * 100 }}">
            <article>

              <div class="post-img">
                <img src="{{ asset(optional($post)->featured_image ?? 'assets/img/blog/blog-1.jpg') }}" alt="" class="img-fluid">
              </div>

              <p class="post-category">{{ optional(optional($post)->category)->name ?? 'Blog' }}</p>

              <h2 class="title">
                <a href="{{ route('blog.show', optional($post)->slug ?? $post) }}">{{ optional($post)->title }}</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/blog/blog-author.jpg') }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">{{ optional(optional($post)->author)->name ?? 'Admin' }}</p>
                  <p class="post-date">
                    @if(optional($post)->published_at)
                      <time datetime="{{ $post->published_at->toDateTimeString() }}">{{ $post->published_at->format('M j, Y') }}</time>
                    @else
                      <span>No date</span>
                    @endif
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          @endforeach

        </div><!-- End recent posts list -->

      </div>

    </section><!-- /Recent Posts Section -->
    @endif

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="mb-5">
        <iframe style="width: 100%; height: 400px;" src="{{ Setting::get('google_maps_embed', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621') }}" frameborder="0" allowfullscreen=""></iframe>
      </div><!-- End Google Maps -->

      <div class="container" data-aos="fade">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-4">

            <div class="info">
              <h3>Get in touch</h3>
              <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi minus.</p>

              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>{{ Setting::get('contact_address', 'A108 Adam Street, New York, NY 535022') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>{{ Setting::get('contact_email', 'info@example.com') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>{{ Setting::get('contact_phone', '+1 5589 55488 55') }}</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            <form action="{{ route('contact.store') }}" method="post" role="form" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" placeholder="Message" required=""></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->


@endsection
