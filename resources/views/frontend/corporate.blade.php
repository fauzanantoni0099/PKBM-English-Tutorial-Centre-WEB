@extends('frontend.blank')
@section('content')
  <div class="untree_co-hero overlay" style="background-image: url('/front/images/img-school-3-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">School Staff</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                  <p>Staff adalah individu yang dipekerjakan oleh sebuah organisasi, perusahaan, atau entitas untuk melakukan tugas-tugas tertentu sesuai dengan jabatan atau posisi yang dipegang. Mereka merupakan bagian integral dari suatu perusahaan dan bertanggung jawab atas pelaksanaan tugas-tugas yang diberikan.
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
    <div class="container">
        <div class="row">
            @foreach($corporates as $corporate)
        <div class="col-12 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="0">
          <div class="staff text-center">
            <div class="mb-4">
                    <img src="/{{$corporate->logo}}" alt="Image" class="img-fluid">
            </div>
            <div class="staff-body">
{{--              <h3 class="staff-name">{{$emplo->name}}</h3>--}}
{{--              <span class="d-block position mb-4">{{$employee->position}}</span>--}}
{{--              <p class="mb-4">"{{$employee->kata}}"</p>--}}
{{--              <div class="social">--}}
{{--                <a href="https://www.instagram.com/{{$employee->sosmed}}/" class="mx-2"><span class="icon-instagram"></span></a>--}}
{{--                <a href="https://wa.me/62{{$employee->phone}}" class="mx-2"><span class="icon-whatsapp"></span></a>--}}
              </div>
            </div>
          </div>
        </div>
            @endforeach
      </div>
    </div>
  </div> <!-- /.untree_co-section -->
@endsection
