@extends('frontend.blank')
@section('content')
  <div class="untree_co-hero overlay" style="background-image: url('/front/images/img-school-2-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Contact Us</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                  <p>memudahkan pengguna untuk berkomunikasi, memberikan umpan balik, melaporkan masalah, atau mendapatkan bantuan jika diperlukan.</p>
              </div>
            </div>


          </div>

        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->




  <div class="untree_co-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-lg-4 mb-5 order-2 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
          <div class="contact-info">

            <div class="address mt-4">
              <i class="icon-room"></i>
              <h4 class="mb-2">Location:</h4>
              <p>Jakarta E 24 Asratek. Ulak karang
                  Padang, Sumatera Barat</p>
            </div>

            <div class="open-hours mt-4">
              <i class="icon-clock-o"></i>
              <h4 class="mb-2">Open Hours:</h4>
              <p>
                Monday - Saturday<br>
                08:00 AM - 21:00 PM
              </p>
            </div>

            <div class="email mt-4">
              <i class="icon-envelope"></i>
              <h4 class="mb-2">Email:</h4>
              <p>etcbesmartwithus77@gmail.com</p>
            </div>

            <div class="phone mt-4">
              <i class="icon-phone"></i>
              <h4 class="mb-2">Call:</h4>
              <p>0751 446988</p>
            </div>

          </div>
        </div>
        <div class="col-lg-7 mr-auto order-1" data-aos="fade-up" data-aos-delay="200">
          <form action="{{route('comment.store')}}" method="post">
              @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="col-6 mb-3">
                <input type="email" class="form-control" placeholder="Your Email" name="gmail">
              </div>
              <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Subject" name="subject">
              </div>
              <div class="col-12 mb-3">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>

              <div class="col-12">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div> <!-- /.untree_co-section -->
@endsection
