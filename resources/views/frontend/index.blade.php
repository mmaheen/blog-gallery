@extends('frontend.layouts.layout')

@section('title')
  Home
@endsection

@section('content')
        <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Better Solutions For Your Business</h1>
            <p>We are team of talented designers making websites with Bootstrap</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('assets/frontend') }}/assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="category" class="clients section light-background">

      <div class="container" data-aos="zoom-in">

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
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            @foreach($categories as $category)
              <a class="swiper-slide" href="">
                <img src="{{ asset('uploads/categories') }}/{{ $category->image }}" class="img-fluid" alt="">
              </a>
            @endforeach
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-center">
            <img src="{{ asset('assets/frontend') }}/assets/img/illustration/illustration-10.webp" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 pt-4 pt-lg-0 content">

            <h3>Skills</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>

            <div class="skills-content skills-animation">
              @foreach($skills as $skill)
                <div class="progress">
                  <span class="skill"><span>{{$skill->title}}</span> <i class="val">{{$skill->percentage}}</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><!-- End Skills Item -->
              @endforeach
            </div>

          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="{{ asset('assets/frontend') }}/assets/img/bg/bg-8.webp" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Call To Action</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Portfolio Section -->
    <section id="photo" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Photo</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            @foreach($random_categories as $category)
              <li data-filter=".filter-{{$category->id}}">{{$category->title}}</li>
            @endforeach
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            @foreach($photos as $photo)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{$photo->category->id}}">
                <img src="{{ asset('uploads/photos') }}/{{ $photo->image }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{$photo->category->title}}</h4>
                  <p>{{$photo->title}}</p>
                  <a href="{{ asset('uploads/photos') }}/{{ $photo->image }}" title="{{ $photo->title }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('photo.details',$photo->id) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div><!-- End Portfolio Item -->
            @endforeach

          </div><!-- End Portfolio Container -->

        </div>

        <div class = "mt-4">
          {{$photos->links()}}
        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Recent Blog Postst Section -->
    <section id="recent-blog-posts" class="recent-blog-postst section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recent Blog Posts</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">
          @foreach($blogs as $blog)
            <div class="col-xl-4 col-md-6">
              <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="{{100+100}}">

                <div class="post-img position-relative overflow-hidden">
                  <img src="{{ asset('uploads/blogs') }}/{{$blog->image}}" class="img-fluid" alt="">
                  <span class="post-date">{{date('F j',strtotime($blog->created_at))}}</span>
                </div>

                <div class="post-content d-flex flex-column">

                  <h3 class="post-title">
                    {{substr($blog->title , 0, 65)}}
                    @if(strlen($blog->title)>65)
                    ...
                    @endif
                  </h3>

                  <div class="meta d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-person"></i> <span class="ps-2">{{ $blog->user->name }}</span>
                    </div>
                    <span class="px-3 text-black-50">/</span>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-folder2"></i> <span class="ps-2">{{ $blog->category->title }}</span>
                    </div>
                  </div>

                  <hr>

                  <a href="{{ route('blog.details', $blog->id) }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                </div>

              </div>
            </div><!-- End post item -->
          @endforeach
        </div>

      </div>

    </section><!-- /Recent Blog Postst Section -->


    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          @foreach($users as $user)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{100+100}}">
              <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="{{ asset('uploads/users') }}/{{ $user->image }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{$user->name}}</h4>
                  <span>{{ucfirst($user->role)}}</span>
                  <p>{{$faker->sentence}}</p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""> <i class="bi bi-linkedin"></i> </a>
                  </div>
                </div>
              </div>
            </div><!-- End Team Member -->
          @endforeach

        </div>

      </div>

    </section><!-- /Team Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

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
                  <img src="{{ asset('uploads/users') }}/{{$testimonial->user->image}}" class="testimonial-img" alt="">
                  <h3>{{$testimonial->user->name}}</h3>
                  <h4>Viewer &amp; {{ ucfirst($testimonial->user->role) }}</h4>
                  <div class="stars">
                    @foreach(range(1,$testimonial->rating) as $index)
                      <i class="bi bi-star-fill"></i>
                    @endforeach
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>{{$testimonial->review}}</span>
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

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="{{route('contact')}}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->
@endsection