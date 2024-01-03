@extends('frontend.blank')
@section('content')
  <div class="untree_co-hero overlay" style="background-image: url('/front/images/img-school-4-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Gallery</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                <p>kumpulan atau koleksi gambar, foto, atau media visual lainnya yang ditampilkan atau disusun secara berurutan atau dalam tata letak tertentu. Biasanya, gallery digunakan untuk menampilkan karya seni, dokumentasi acara, produk, atau konten visual lainnya secara estetis dan <terstruktur class=""></terstruktur></p>
              </div>

                <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="{{route('frontend.contact')}}" class="btn btn-secondary">Contact us</a></p>


            </div>


          </div>

        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->

  <div class="untree_co-section">
    <div class="container">
      <div class="row">
          @foreach($galleriess as $gallery)
              @foreach($gallery->images as $image)
                  <div class="col-md-6 col-lg-4 item">
                      <a href="{{$image->name_path}}" class="item-wrap fancybox mb-4" data-fancybox="gal" data-aos="fade-up" data-aos-delay="0">
                          <span class="icon-search2"></span>
                          <img class="img-fluid" src="/{{$image->name_path}}">
                      </a>
                  </div>
              @endforeach
          @endforeach
      </div>
    </div>
  </div> <!-- /.untree_co-section -->
@endsection
