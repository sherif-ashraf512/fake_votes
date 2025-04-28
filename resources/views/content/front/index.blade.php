@php
$configData = Helper::appClasses();
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BU-VO A Dynamic Online Platform That Combines Smart Voting And Seamless Shopping..</title>
    <link rel="icon" href="{{asset("assect/images/favicon.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("assect/style/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assect/style/style.css")}}">
    <link rel="stylesheet" href="{{asset("assect/fontawesome-free-6.7.1-web/css/all.min.css")}}">





</head>
<body>
           <!-- NavBar Start -->
           <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
              <a class="navbar-brand fst-italic fs-3" href="#">
                <i class="fa-1x fa-solid fa-crown px-3"></i>
                BU-VO
              </a>
              <button class="navbar-toggler bs-info-border-subtle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0" id="navbarLinks">
                  <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item mx-2">
                    <a class="nav-link" href="#About Us">About</a>
                  </li>
                  <li class="nav-item mx-2">
                    <a class="nav-link" href="#Service">Service</a>
                  </li>
                  <li class="nav-item mx-2">
                    <a class="nav-link" href="#Products">Products</a>
                  </li>
                  <li class="nav-item mx-2">
                    <a class="nav-link" href="#Contact Us">Contact Us</a>
                  </li>
                  <li class="nav-item mx-2">
                    <a class="nav-link" href="#Top-Reviews">Reviews</a>
                  </li>
                  <ul class="navbar-nav nav-btn">

                  </ul>
                </ul>
                <ul class="navbar-nav nav-btn">
                    <li class="nav-item">
                        <button id="darkModeToggle" class="btn btn-link text-light mx-2">
                          <i class="fas fa-moon"></i>
                        </button>

                  <li class="nav-item">
                    <a class="btn btn-outline-light" href="{{route('login-page')}}">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
           <!-- NavBar End -->

     <!-- Carousel Start -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset("assect/images/Img Carousel/4-1536x864.png")}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- يمكنك إضافة تسميات هنا إذا أردت -->
        <h5 class="text-dark">Welcome to BU-VO</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset("assect/images/Img Carousel/7-1536x864.png")}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset("assect/images/Img Carousel/Untitled design (3).png")}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset("assect/images/Img Carousel/Untitled design (1).png")}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset("assect/images/Img Carousel/Untitled design.png")}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel End -->

            <!-- About Start -->
           <div class="container-xxl py-5 my-5" id="About Us">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100" src="{{asset("assect/images/img/pexels-photo-4937448.jpeg")}}" alt="" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h6 class="section-title bg-white text-start text-secondary pe-3">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-success">BU-VO</span></h1>
                        <p class="mb-4 fw-normal" style="font-size: 16px; line-height: 1.8; color: #333;">
                            👋 Welcome to Bu-Vo, Where Fashion Meets Your Voice!<br>
                            ✨ Discover the latest trends, shop your favorite styles, and be part of the fashion conversation!<br><br>
                            🛍️ Buy Clothes You Love – Explore a wide range of trendy outfits handpicked just for you.<br><br>
                            🗳️ Vote for the Best Looks – Your opinion matters! Rate and vote on your favorite items and help us decide what's hot and what's not.<br><br>
                            🎯 Whether you're here to refresh your wardrobe or shape tomorrow's trends, you're in the right place.<br><br>
                            🖤 Join the community, express your style, and let your voice be heard – one outfit at a time.
                            </p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>New Collection</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Women</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Men</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Custom Services</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Best Seller</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                            </div>
                        </div >
                        <a class="btn btn-outline-secondary py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


            <!-- Service Start -->
    <div class="container-xxl py-5" id="Service">
      <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
              <h1 class="mb-5">Our Services</h1>
          </div>
          <div class="row g-4">
              <div class="col-lg-3 col-sm-6" data-wow-delay="0.1s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                        <i class=" fa fa-3x fa-solid fa-bag-shopping text-darkblue mb-4 "></i>
                          <h5>Bag-Shopping</h5>
                          <p>"Shop Stylish Bags – Your Perfect Carry Companion Awaits!"</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6" data-wow-delay="0.3s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-square-poll-horizontal text-darkblue mb-4"></i>
                          <h5>Square-Poll-Horizontal</h5>
                          <p>"Track Insights with Our Poll & Analytics Icon "Lorem ipsum dolor sit amet </p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6 " data-wow-delay="0.5s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-solid fa-credit-card text-darkblue mb-4"></i>
                          <h5>Credit-Card</h5>
                          <p>"Secure Payments & Card Management at Your Fingertips"</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-globe text-darkblue mb-4"></i>
                          <h5>Globe</h5>
                          <p>"Explore the World with Our Global Connectivity Icon " Lorem ipsum dolor sit amet </p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-solid fa-comments text-darkblue mb-4"></i>
                          <h5>Comments</h5>
                          <p>Share Your Thoughts – Leave a Comment! Thanks for your comment!</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-solid fa-certificate text-darkblue mb-4"></i>
                          <h5>Certificate</h5>
                          <p>"Verify Your Achievements with Our Certificate Badge " Lorem ipsum dolor, sit amet </p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-solid fa-screwdriver-wrench text-darkblue mb-4"></i>
                          <h5>Screwdriver-Wrench</h5>
                          <p>"Customize & Repair – Tools for Precision Adjustments" Lorem ipsum dolor, sit amet</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-cog text-darkblue mb-4"></i>
                          <h5>Event Management</h5>
                          <p>"Plan & Manage Events Seamlessly" ipsum justo dolor sed clita amet diam</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Service End -->
   <!-- VOTE START -->
    <div class="container-fluid bg-light py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center mb-5 ">
                <h1 class="mb-5 text-info bg-black py-3 spinner-border-sm text-vote">Vote For Your Favorite Product</h1>
                <a href="./vote.html" class="btn  btn-outline-dark btn-vote">Voting Launch<i class="fa-regular fa-circle-right"></i></a>

            </div>
        </div>
    </div>

   <!-- VOTE END -->
<!-- Products Section - Responsive Version -->
<div id="Products" class="container-xxl py-5">
  <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
          <h6 class="section-title bg-white text-center text-primary px-3">Our Collection</h6>
          <h1 class="mb-5">Featured Products</h1>
      </div>
      <div class="row g-4 justify-content-center">
          <!-- Product 1 -->
          @foreach($latestProducts as $product)
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="card h-100 shadow-sm border-0">
                  <img src="{{asset("assets/$product->image")}}" class="card-img-top img-fluid" alt="Product Image">
                  <div class="card-body text-center">
                      <h5 class="card-title">{{$product->title}}</h5>
                      <p class="card-text">{!! Str::limit(str_replace('"', '', $product->description), 300) !!}</p>
                      <p class="card-text">{{$product->price}} EGP</p>
                      <div class="d-flex justify-content-center gap-2">
                          <a href="{{route('make-order',$product->id)}}" class="btn btn-outline-primary btn-sm">BUY</a>
                          <a href="" class="btn btn-outline-secondary btn-sm">VIEW</a>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
  </div>
</div>
    <!-- Team Start -->
    <div class="container-xxl py-5" id="Contact Us">
      <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
              <h6 class="section-title bg-white text-center text-primary px-3">BU-VO Guides</h6>
              <h1 class="mb-5">Meet Our Guides</h1>
          </div>
          <div class="row g-4">
              <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="team-item">
                      <div class="overflow-hidden">
                          <img class="img-fluid" src="{{asset("assect/images/img/Team/team-1.jpg")}}" alt="">
                      </div>
                      <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                      </div>
                      <div class="text-center p-4">
                          <h5 class="mb-0">Ahmed Ezz</h5>
                          <small>(GM)</small>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="team-item">
                      <div class="overflow-hidden">
                          <img class="img-fluid" src="{{asset("assect/images/img/Team/team-2.jpg")}}" alt="">
                      </div>
                      <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                      </div>
                      <div class="text-center p-4">
                          <h5 class="mb-0">Mai Elkhady</h5>
                          <small>(CEO)</small>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                  <div class="team-item">
                      <div class="overflow-hidden">
                          <img class="img-fluid" src="{{asset("assect/images/img/Team/team-3.jpg")}}" alt="">
                      </div>
                      <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                      </div>
                      <div class="text-center p-4">
                          <h5 class="mb-0">Mohamed Hany</h5>
                          <small>(CMO)</small>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                  <div class="team-item">
                      <div class="overflow-hidden">
                          <img class="img-fluid" src="{{asset("assect/images/img/Team/team-4.jpg")}}" alt="">
                      </div>
                      <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                          <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                      </div>
                      <div class="text-center p-4">
                          <h5 class="mb-0">Rana Ali</h5>
                          <small>(CTO)</small>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Team End -->
  <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="mb-5">Top Reviews?!</h1>
</div>
<!-- Testimonial Start -->
<div class="container-xxl py-5" id="Top-Reviews">
  <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
          <h6 class="section-title bg-white text-center text-primary px-3">Customer Feedback</h6>
          <h1 class="mb-5">Top Reviews</h1>
      </div>

      <div class="testimonial-carousel-container position-relative">
          <div class="testimonial-carousel">
              <!-- Slide 1 -->
              @foreach ($reviews as $review)
                <div class="testimonial-slide">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Testimonial 1" class="testimonial-img">
                    <div class="slide-content">
                        <div class="testimonial-quote">{{$review->description}}</div>
                        <h5 class="testimonial-name">{{$review->user->name}}</h5>
                        <small class="testimonial-role">{{$review->product->title}}</small>
                        <div class="testimonial-rating">
                          @for ($i = 0 ; $i < $review->stars; $i++)
                            <i class="fas fa-star"></i>
                          @endfor
                        </div>
                    </div>
                </div>
              @endforeach

              <!-- Add remaining slides following the same pattern -->
          </div>

          <!-- Navigation Buttons -->
          <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
          <button class="carousel-btn next-btn"><i class="fas fa-chevron-right"></i></button>

          <!-- Pagination Dots -->
          <div class="carousel-dots"></div>
      </div>
  </div>
</div>
<!-- Testimonial End -->

     <!-- Footer Start -->
     <div class="container-fluid footer text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street,NASR CITE, EG</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="">Cardiology</a>
                    <a class="btn btn-link" href="">Pulmonary</a>
                    <a class="btn btn-link" href="">Neurology</a>
                    <a class="btn btn-link" href="">Orthopedics</a>
                    <a class="btn btn-link" href="">Laboratory</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>BU-VO A Dynamic Online
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->








<script src="{{asset("assect/javascript/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assect/owlcarousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("assect/javascript/main.js")}}"></script>


</body>
</html>
