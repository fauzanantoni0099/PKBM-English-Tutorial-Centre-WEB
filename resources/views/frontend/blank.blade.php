<!-- /*
* Template Name: Learner
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="/assets/images/etc.jpg">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="/front/css/bootstrap.min.css">
  <link rel="stylesheet" href="/front/css/animate.min.css">
  <link rel="stylesheet" href="/front/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/front/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="/front/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/front/fonts/icomoon/style.css">
  <link rel="stylesheet" href="/front/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="/front/css/aos.css">
  <link rel="stylesheet" href="/front/css/style.css">

  <title>PKBM - English Tutorial Centre</title>
</head>

<body>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>



  <nav class="site-nav mb-5">
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center">
          <p class="logo menu-absolute m-0">English Tutorial Centre<span class="text-primary">.</span></a>

          <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <li><a href="{{route('frontend.staff')}}">Our Staff</a></li>
            <li><a href="{{route('frontend.news')}}">Activity</a></li>
            <li><a href="{{route('frontend.gallery')}}">Gallery</a></li>
            <li><a href="{{route('frontend.about')}}">About</a></li>
          </ul>

        </div>
      </div>
    </div>
  </nav>
@yield('content')
  <div class="site-footer">


      <div class="container">

          <div class="row">
              <div class="col-lg-3 mr-auto">
                  <div class="widget">
                      <h3>Connect</h3>
                      <ul class="list-unstyled social">
                          <li><a href="#"><span class="icon-instagram"></span></a></li>
                          <li><a href="#"><span class="icon-twitter"></span></a></li>
                          <li><a href="#"><span class="icon-facebook"></span></a></li>
                          <li><a href="#"><span class="icon-linkedin"></span></a></li>
                          <li><a href="#"><span class="icon-pinterest"></span></a></li>
                          <li><a href="#"><span class="icon-youtube"></span></a></li>
                      </ul>
                  </div> <!-- /.widget -->
              </div> <!-- /.col-lg-3 -->

              <div class="col-lg-4">
                  <div class="widget">
                      <h3>Gallery</h3>
                      <ul class="instafeed instagram-gallery list-unstyled">
                          @foreach($galleries as $gallery)
                              @foreach($gallery->images as $image)
                                  <li><a class="instagram-item" href="{{$image->name_path}}" data-fancybox="gal"><img src="/{{$image->name_path}}" alt="" width="72" height="72"></a>
                                  </li>
                              @endforeach
                          @endforeach
                      </ul>
                  </div> <!-- /.widget -->
              </div> <!-- /.col-lg-3 -->


              <div class="col-lg-4">
                  <div class="widget">
                      <h3>Contact</h3>
                      <address>Jakarta E 24 Asratek. Ulak karang Padang, Sumatera Barat</address>
                      <ul class="list-unstyled links mb-4">
                          <li><a href="tel://11234567890">446 988</a></li>
                          <li><a href="tel://11234567890">0751 446988</a></li>
                          <li><a href="mailto:etcbesmartwithus77@gmail.com">etcbesmartwithus77@gmail.com</a></li>
                      </ul>
                  </div> <!-- /.widget -->
              </div> <!-- /.col-lg-3 -->

          </div> <!-- /.row -->

          <div class="row mt-5">
              <div class="col-12 text-center">
                  <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. PKBM. &mdash; English Tutorial Centre by <a href="https://untree.co">Taffy Development</a>
              </div>
          </div>
      </div> <!-- /.container -->
  </div> <!-- /.site-footer -->

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <script src="/front/js/jquery-3.4.1.min.js"></script>
    <script src="/front/js/popper.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/owl.carousel.min.js"></script>
    <script src="/front/js/jquery.animateNumber.min.js"></script>
    <script src="/front/js/jquery.waypoints.min.js"></script>
    <script src="/front/js/jquery.fancybox.min.js"></script>
    <script src="/front/js/jquery.sticky.js"></script>
    <script src="/front/js/aos.js"></script>
    <script src="/front/js/custom.js"></script>

  </body>

  </html>
