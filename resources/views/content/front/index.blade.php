@php
$configData = Helper::appClasses();
use Illuminate\Support\Str;
@endphp

<style>
    #heroAnimationImg img{
      height: 400px;
    }
  @media (max-width:1199.9px){
    #heroAnimationImg img{
      display: none;
    }
  }
</style>

@extends('layouts/layoutFront')

@section('title', 'Home')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/front-page-landing.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.js',
  'resources/assets/vendor/libs/swiper/swiper.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/front-page-landing.js'])
@endsection


@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
  <!-- Hero: Start -->
  <section id="hero-animation">
    <div id="landingHero" class="section-py landing-hero position-relative">
      <img src="{{asset('assets/img/front-pages/backgrounds/hero-bg.png')}}" alt="hero background" class="position-absolute top-0 start-50 translate-middle-x object-fit-cover w-100 h-100" data-speed="1" />
      <div class="container">
        <div class="hero-text-box text-center position-relative">
          <h1 class="text-primary hero-title display-6 fw-extrabold">Join the Buzz – Shop Smart, Share Your Voice!</h1>
          <h2 class="hero-sub-title h6 mb-6">
            Join a lively community to shop smart, read reviews, and share your take.<br class="d-none d-lg-block" />
            Connect, post, and grab great deals today!
          </h2>
          <div class="landing-hero-btn d-inline-block position-relative">
            <span class="hero-btn-item position-absolute d-none d-md-flex fw-medium">Join community
              <img src="{{asset('assets/img/front-pages/icons/Join-community-arrow.png')}}" alt="Join community arrow" class="scaleX-n1-rtl" /></span>
            <a href="#landingCTA" class="btn btn-primary btn-lg">Get early access</a>
          </div>
        </div>
        <div id="heroDashboardAnimation" class="hero-animation-img">
          <a href="javascript:" target="_blank">
            <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
              <img src="{{asset('assets/img/front-pages/landing-page/landing-page.png')}}" alt="hero elements" class="position-absolute hero-elements-img animation-img top-0 start-0" data-app-light-img="front-pages/landing-page/landing-page.png" data-app-dark-img="front-pages/landing-page/landing-page.png" />
            </div>
          </a>
        </div>
      </div>

    </div>
    <div class="landing-hero-blank"></div>
  </section>
  <!-- Hero: End -->

  <!-- Useful features: Start -->
  <section id="landingFeatures" class="section-py landing-features">
    <div class="container">
      <div class="text-center mb-4">
        <span class="badge bg-label-primary">Latest Products</span>
      </div>
      <h4 class="text-center mb-1">
        <span class="position-relative fw-extrabold z-1">Everything you need
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        is here
      </h4>
      <p class="text-center mb-12">More than just a collection of items, this package delivers ready-to-use conceptual products.</p>
      <div class="features-icon-wrapper row gx-0 gy-6 g-sm-12">
        @foreach($latestProducts as $product)
        <div class="col-md-6 col-xl-4">
          <div class="card">
            <img class="card-img-top" src="{{asset("assets/$product->image")}}" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">{{$product->title}}</h5>
              <p class="text-truncate">
                {!! Str::limit(str_replace('"', '', $product->description), 300) !!}
              </p>
              <p class="badge fs-5 bg-warning">
                {{$product->price}} EGP
              </p>
              <p class="card-text">
                <small class="text-muted">{{$product->created_at->diffForHumans()}}</small>
              </p>
              <a href="{{route('make-order',$product->id)}}" class="btn fw-bold btn-success">BUY</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center mt-5">
        <a href="{{route('pages-home')}}" class="btn btn-primary">View All</a>
      </div>
    </div>
  </section>
  <!-- Useful features: End -->

  <!-- Real customers reviews: Start -->
  <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
    <!-- What people say slider: Start -->
    <div class="container">
      <div class="row align-items-center gx-0 gy-4 g-lg-5 mb-5 pb-md-5">
        <div class="col-md-6 col-lg-5 col-xl-3">
          <div class="mb-4">
            <span class="badge bg-label-primary">Real Customers Reviews</span>
          </div>
          <h4 class="mb-1">
            <span class="position-relative fw-extrabold z-1">What people say
              <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
            </span>
          </h4>
          <p class="mb-5 mb-md-12">
            See what our customers have to<br class="d-none d-xl-block" />
            say about their experience.
          </p>
          <div class="landing-reviews-btns">
            <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn me-4 scaleX-n1-rtl" type="button">
              <i class="ti ti-chevron-left ti-md"></i>
            </button>
            <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn scaleX-n1-rtl" type="button">
              <i class="ti ti-chevron-right ti-md"></i>
            </button>
          </div>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-9">
          <div class="swiper-reviews-carousel overflow-hidden">
            <div class="swiper" id="swiper-reviews">

              <div class="swiper-wrapper">
                @foreach ($reviews as $review)
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-4">
                        <h4>{{$review->product->title}}</h4>
                      </div>
                      <p>
                        {{$review->description}}
                      </p>
                      <div class="text-warning mb-4">
                        @for ($i = 0 ; $i < $review->stars; $i++)
                          <i class="ti ti-star-filled"></i>
                        @endfor
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-3 avatar-sm">
                          <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">{{$review->user->name}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- What people say slider: End -->
    <hr class="m-0 mt-6 mt-md-12" />
    <!-- Logo slider: Start -->
    <div class="container">
      <div class="swiper-logo-carousel py-8">
        <div class="swiper" id="swiper-clients-logos">
          <div class="swiper-wrapper" style="height: auto">
            @foreach ($reviews as $review)
            <div class="swiper-slide">
              <h5>{{$review->product->title}}</h5>
            </div>
            @endforeach
          </div>
        </div>
      {{-- </div> --}}
    </div>
    <!-- Logo slider: End -->
  </section>
  <!-- Real customers reviews: End -->

  <!-- Our great team: Start -->
  <section id="landingTeam" class="section-py landing-team">
    <div class="container">
      <div class="text-center mb-4">
        <span class="badge bg-label-primary">Our Great Team</span>
      </div>
      <h4 class="text-center mb-1">
        <span class="position-relative fw-extrabold z-1">Supported
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        by Real People
      </h4>
      <p class="text-center mb-md-11 pb-0 pb-xl-12">Who is behind these great-looking interfaces?</p>
      <div class="row gy-12 mt-2">
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-primary border border-bottom-0 border-label-primary position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-1.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" />
            </div>
            <div class="card-body border border-top-0 border-label-primary text-center">
              <h5 class="card-title mb-0">Sophie Gilbert</h5>
              <p class="text-muted mb-0">Project Manager</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-info border border-bottom-0 border-label-info position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-2.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" />
            </div>
            <div class="card-body border border-top-0 border-label-info text-center">
              <h5 class="card-title mb-0">Paul Miles</h5>
              <p class="text-muted mb-0">UI Designer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-danger border border-bottom-0 border-label-danger position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-3.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" />
            </div>
            <div class="card-body border border-top-0 border-label-danger text-center">
              <h5 class="card-title mb-0">Nannie Ford</h5>
              <p class="text-muted mb-0">Development Lead</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-success border border-bottom-0 border-label-success position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-4.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" />
            </div>
            <div class="card-body border border-top-0 border-label-success text-center">
              <h5 class="card-title mb-0">Chris Watkins</h5>
              <p class="text-muted mb-0">Marketing Manager</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our great team: End -->

  <!-- Fun facts: Start -->
  <section id="landingFunFacts" class="section-py landing-fun-facts">
    <div class="container">
      <div class="row gy-6">
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-primary shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/laptop.png')}}" alt="laptop" class="mb-4" />
              <h3 class="mb-0">7.1k+</h3>
              <p class="fw-medium mb-0">
                Support Tickets<br />
                Resolved
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-success shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/user-success.png')}}" alt="laptop" class="mb-4" />
              <h3 class="mb-0">50k+</h3>
              <p class="fw-medium mb-0">
                Join creatives<br />
                community
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-info shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/diamond-info.png')}}" alt="laptop" class="mb-4" />
              <h3 class="mb-0">4.8/5</h3>
              <p class="fw-medium mb-0">
                Highly Rated<br />
                Products
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-warning shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/check-warning.png')}}" alt="laptop" class="mb-4" />
              <h3 class="mb-0">100%</h3>
              <p class="fw-medium mb-0">
                Money Back<br />
                Guarantee
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fun facts: End -->

  <!-- FAQ: Start -->
  <section id="landingFAQ" class="section-py bg-body landing-faq">
    <div class="container">
      <div class="text-center mb-4">
        <span class="badge bg-label-primary">FAQ</span>
      </div>
      <h4 class="text-center mb-1">Frequently asked
        <span class="position-relative fw-extrabold z-1">questions
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
      </h4>
      <p class="text-center mb-12 pb-md-4">Browse through these FAQs to find answers to commonly asked questions.</p>
      <div class="row gy-12 align-items-center">
        <div class="col-lg-5">
          <div class="text-center">
            <img src="{{asset('assets/img/front-pages/landing-page/faq-boy-with-logos.png')}}" alt="faq boy with logos" class="faq-image" />
          </div>
        </div>
        <div class="col-lg-7">
          <div class="accordion" id="accordionExample">
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                  Do you charge for each upgrade?
                </button>
              </h2>

              <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                  marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                  soufflé. Wafer gummi bears marshmallow pastry pie.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                  Do I need to purchase a license for each website?
                </button>
              </h2>
              <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                  dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies. Jelly
                  beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                </div>
              </div>
            </div>
            <div class="card accordion-item active">
              <h2 class="accordion-header" id="headingThree">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                  What is regular license?
                </button>
              </h2>
              <div id="accordionThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Regular license can be used for end products that do not charge users for access or service(access
                  is free and there will be no monthly subscription fee). Single regular license can be used for
                  single end product and end product can be used by you or your client. If you want to sell end
                  product to multiple clients then you will need to purchase separate license for each client. The
                  same rule applies if you want to use the same end product on multiple domains(unique setup). For
                  more info on regular license you can check official description.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour">
                  What is extended license?
                </button>
              </h2>
              <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis et aliquid quaerat possimus maxime!
                  Mollitia reprehenderit neque repellat deleniti delectus architecto dolorum maxime, blanditiis
                  earum ea, incidunt quam possimus cumque.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFive" aria-expanded="false" aria-controls="accordionFive">
                  Which license is applicable for SASS application?
                </button>
              </h2>
              <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi molestias exercitationem ab cum
                  nemo facere voluptates veritatis quia, eveniet veniam at et repudiandae mollitia ipsam quasi
                  labore enim architecto non!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FAQ: End -->

  <!-- CTA: Start -->
  <section id="landingCTA" class="section-py landing-cta position-relative p-lg-0 pb-0">
    <img src="{{asset('assets/img/front-pages/backgrounds/cta-bg-'.$configData['style'].'.png')}}" class="position-absolute bottom-0 end-0 scaleX-n1-rtl h-100 w-100 z-n1" alt="cta image" data-app-light-img="front-pages/backgrounds/cta-bg-light.png" data-app-dark-img="front-pages/backgrounds/cta-bg-dark.png" />
    <div class="container">
      <div class="row align-items-center gy-12">
        <div class="col-lg-6 text-start text-sm-center text-lg-start">
          <h3 class="cta-title text-primary fw-bold mb-0">Ready to Get Started?</h3>
          <h5 class="text-body mb-8">Start communicate with others</h5>
          <a href="{{route('pages-home')}}" class="btn btn-lg btn-primary">Get Started</a>
        </div>
        <div class="col-lg-6 pt-lg-12 text-center text-lg-end">
          <img src="{{asset('assets/img/front-pages/landing-page/community.png')}}" alt="cta dashboard" class="img-fluid mt-lg-4" />
        </div>
      </div>
    </div>
  </section>
  <!-- CTA: End -->

  <!-- Contact Us: Start -->
  <section id="landingContact" class="section-py bg-body landing-contact">
    <div class="container">
      <div class="text-center mb-4">
        <span class="badge bg-label-primary">Contact US</span>
      </div>
      <h4 class="text-center mb-1">
        <span class="position-relative fw-extrabold z-1">Let's work
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        together
      </h4>
      <p class="text-center mb-12 pb-md-4">Any question or remark? just write us a message</p>
      <div class="row g-6">
        <div class="col-lg-5">
          <div class="contact-img-box position-relative border p-2 h-100">
            <img src="{{asset('assets/img/front-pages/icons/contact-border.png')}}" alt="contact border" class="contact-border-img position-absolute d-none d-lg-block scaleX-n1-rtl" />
            <img src="{{asset('assets/img/front-pages/landing-page/contact-customer-service.png')}}" alt="contact customer service" class="contact-img  w-100 scaleX-n1-rtl" />
            <div class="p-4 pb-2">
              <div class="row g-4">
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-primary rounded p-1_5 me-3"><i class="ti ti-mail ti-lg"></i></div>
                    <div>
                      <p class="mb-0">Email</p>
                      <h6 class="mb-0"><a href="mailto:example@gmail.com" class="text-heading">example@gmail.com</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-success rounded p-1_5 me-3"><i class="ti ti-phone-call ti-lg"></i></div>
                    <div>
                      <p class="mb-0">Phone</p>
                      <h6 class="mb-0"><a href="tel:+1234-568-963" class="text-heading">+1234 568 963</a></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="mb-2">Send a message</h4>
              <p class="mb-6">
                If you would like to discuss anything related to payment, account, licensing,<br class="d-none d-lg-block" />
                partnerships, or have pre-sales questions, you’re at the right place.
              </p>
              <form method="POST" action="{{route('message.send')}}">
                @csrf
                @if ($errors->any())
                <script>
                  const element = document.getElementById('landingContact');
                  window.scrollTo({
                    top: element.offsetTop,
                    behavior: 'smooth'
                  });
                </script>
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                @if (session('success'))
                <script>
                  const element = document.getElementById('landingContact');
                  window.scrollTo({
                    top: element.offsetTop,
                    behavior: 'smooth'
                  });
                </script>
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
                @endif

                <div class="row g-4">
                  <div class="col-md-6">
                    <label class="form-label" for="contact-form-fullname">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="{{old('full_name')}}" id="contact-form-fullname" placeholder="john" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="contact-form-email">Email</label>
                    <input type="email" name="email" id="contact-form-email" value="{{old('email')}}" class="form-control" placeholder="johndoe@gmail.com" />
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="contact-form-message">Message</label>
                    <textarea id="contact-form-message" name="message" class="form-control" rows="7" placeholder="Write a message">{{old('message')}}</textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Send inquiry</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Us: End -->
</div>
@endsection
