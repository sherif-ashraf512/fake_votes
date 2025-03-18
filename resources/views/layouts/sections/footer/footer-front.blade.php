<!-- Footer: Start -->
<footer class="landing-footer bg-body footer-text">
  <div class="footer-top position-relative overflow-hidden z-1">
    <img src="{{asset('assets/img/front-pages/backgrounds/footer-bg-'.$configData['style'].'.png')}}" alt="footer bg" class="footer-bg banner-bg-img z-n1" data-app-light-img="front-pages/backgrounds/footer-bg-light.png" data-app-dark-img="front-pages/backgrounds/footer-bg-dark.png" />
    <div class="container">
      <div class="row gx-0 gy-6 g-lg-10">
        <div class="col-lg-5">
          <a href="javascript:;" class="app-brand-link mb-6">
            <span class="app-brand-logo demo">@include('_partials.macros',['height'=>20,'withbg' => "fill: #fff;"])</span>
            <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">{{ config('variables.templateName') }}</span>
          </a>
          <p class="footer-text footer-logo-description mb-6">
            Join a lively community to shop smart, read reviews, and share your take. Connect, post, and grab great deals today!
          </p>
          <form class="footer-form">
            <label for="footer-email" class="small">Subscribe to newsletter</label>
            <div class="d-flex mt-1">
              <input type="email" class="form-control rounded-0 rounded-start-bottom rounded-start-top" id="footer-email" placeholder="Your email" />
              <button type="submit" class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                Subscribe
              </button>
            </div>
          </form>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <h6 class="footer-title mb-6">Home</h6>
          <ul class="list-unstyled">
            <li class="mb-4">
              <a href="#landingTeam" class="footer-link">Team</a>
            </li>
            <li class="mb-4">
              <a href="#landingFAQ" class="footer-link">FAQ</a>
            </li>
            <li class="mb-4">
              <a href="#landingContact" class="footer-link">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <h6 class="footer-title mb-6">Shop & Community</h6>
          <ul class="list-unstyled">
            <li class="mb-4">
              <a href="#landingFeatures" class="footer-link">Latest Product</a>
            </li>
            <li class="mb-4">
              <a href="#landingReviews" class="footer-link">Reviews</a>
            </li>
            <li class="mb-4">
              <a href="#landingCTA" class="footer-link">Community</a>
            </li>
            <li class="mb-4">
              <a href="{{route('login-page')}}" class="footer-link">Login/Register</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom py-3 py-md-5">
    <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
      <div class="mb-2 mb-md-0">
        <span class="footer-bottom-text">©
          <script>
          document.write(new Date().getFullYear());

          </script>
        </span>
        <a href="{{config('variables.creatorUrl')}}" target="_blank" class="fw-medium text-white text-white">{{config('variables.creatorName')}},</a>
        <span class="footer-bottom-text"> Made with ❤️ for a better web.</span>
      </div>
      <div>
        <a href="{{config('variables.githubUrl')}}" class="me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/github.svg')}}" alt="github icon" />
        </a>
        <a href="{{config('variables.facebookUrl')}}" class="me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/facebook.svg')}}" alt="facebook icon" />
        </a>
        <a href="{{config('variables.twitterUrl')}}" class="me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/twitter.svg')}}" alt="twitter icon" />
        </a>
        <a href="{{config('variables.instagramUrl')}}" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/instagram.svg')}}" alt="google icon" />
        </a>
      </div>
    </div>
  </div>
</footer>
<!-- Footer: End -->
