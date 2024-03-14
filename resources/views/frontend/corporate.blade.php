@extends('frontend.blank')
@section('content')
  <div class="untree_co-hero overlay" style="background-image: url('/front/images/img-school-3-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Corporate</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                  <p>Entity bisnis besar, terstruktur, dan dijalankan oleh manajemen profesional untuk mencapai tujuan ekonomi dan bisnisnya.
                  </p>
              </div>

                <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="{{route('frontend.contact')}}" class="btn btn-secondary">Contact us</a></p>

            </div>


          </div>

        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->

  <div class="untree_co-section bg-light">
      <h2 class="line-bottom text-center mb-4">Logo Corporate</h2>
    <div class="container">
        <div class="row">
            @foreach($corporates as $corporate)
        <div class="col-12 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="0">
          <div class="staff text-center">
            <div class="mb-4">
                    <img src="/{{$corporate->logo}}" alt="Image" class="img-fluid" style="margin: 0 auto;
			width: 200px;
			margin-bottom: 20px;
			border-radius: 20%;">
            </div>
            <div class="staff-body">
              <h3 class="staff-name">{{$corporate->program_name}}</h3>
              <span class="d-block position mb-4">{{$corporate->program_head}}</span>
            </div>
          </div>
        </div>
            @endforeach
      </div>
    </div>
  </div> <!-- /.untree_co-section -->
@endsection
