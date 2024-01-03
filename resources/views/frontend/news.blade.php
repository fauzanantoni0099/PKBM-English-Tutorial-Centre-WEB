@extends('frontend.blank')
@section('content')
  <div class="untree_co-hero overlay" style="background-image: url('/front/images/img-school-6-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Activity</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                  <p> segala tindakan, kegiatan, atau perbuatan yang dilakukan oleh individu atau kelompok yang melibatkan interaksi dengan lingkungan sekitar, baik secara fisik maupun mental.</p>
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
      <div class="row align-items-stretch">
          @foreach($activities as $activity)
        <div class="col-lg-6 mb-4"  data-aos="fade-up" data-aos-delay="100">
          <div class="media-h d-flex h-100">
            <figure>
              <img src="/front/images/img-school-4-min.jpg" alt="Image">
            </figure>
            <div class="media-h-body">
              <h2 class="mb-3" style="color: #0a6aa1">{{$activity->name}}</h2>
              <div class="meta "><span class="icon-calendar mr-2"></span><span>{{\Carbon\Carbon::parse($activity->date)->isoFormat('MMM D, YYYY')}}</span>  <span class="icon-person mr-2"></span>{{$activity->employee->name}}</div>
              <p>{{$activity->description}}</p>
            </div>
          </div>
        </div>
          @endforeach
      </div>

      <div class="row mt-5">
        <div class="col-12 text-center">
          <ul class="list-unstyled custom-pagination">
            <li>{!!$activities->links()!!}</li>
          </ul>
        </div>
      </div>
    </div>
  </div> <!-- /.untree_co-section -->
@endsection
