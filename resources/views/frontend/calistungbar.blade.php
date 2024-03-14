@extends('frontend.blank')
@section('content')

    <div class="untree_co-hero overlay" style="background-image: url('front/images/img-school-3-min.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center ">
                        <div class="col-lg-6 text-center ">
                            <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Calistungbar</h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                                <p>Membaca, menulis dan menghitung, dan menggambar  adalah kemampuan dasar yang harus dikuasai anak untuk bisa memahami materi pembelajaran yang lebih kompleks nantinya dijenjang pendidikan Sekolah Dasar
                                </p>
                            </div>

                            <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="{{route('frontend.contact')}}" class="btn btn-secondary">Contact Us</a></p>

                        </div>


                    </div>

                </div>

            </div> <!-- /.row -->
        </div> <!-- /.container -->

    </div> <!-- /.untree_co-hero -->




    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="custom-block" data-aos="fade-up">
                        <center>
                            <h2 class="section-title">About</h2>
                        </center>
                        <p>Melalui metode calistungbar, anak juga akan selangkah lebih siap  dalam menyerap berbagai ilmu pengetahuan yang akan didapat untuk dianalisa dan aplikasikan dalam mencapai hasil pembelajaran yang maksimal disekolah
                        </p>
                        <p>Fabkidz Calistungbar hadir untuk Moms and Dads yang ingin mempersiapkan buah hati tercinta dalam proses menapaki dan mempersiapkan mereka untuk masuk ke pendidikan yang lebih tinggi dan menerima berbagai materi pembelajaran yang lebih kompleks di Sekolah
                        </p>
                        <p>Kami, Fabkidz Calistungbar hadir dengan dengan biaya terjangkau dengan mengerahkan instruktur instruktur terbaik yang paham tentang dunia pendidikan anak,  Moms and Dads juga diberikan keleluasaan dalam    mengatur kebutuhan belajar sang anak, dan selain itu, kami hadir dengan memberikan pilihan jadwal yang fleksibel sehingga memberikan satu kenyamanan  dalam mempercayakan perkembangan kemampuan akademik dasar buah hati anda kepada kami.
                        </p>
                        <p>Ayo Moms and Dads, segera hubungi Fabkidz Calistungbar untuk mendapatkan informasi yang lebih komprehensif   dan lengkap mengenai hal hal yang akan didapat oleh buah hati anda ketika bergabung di Fabkidz Calistungbar agar bisa bersaing secara kompetitif dalam hal akademik disekolah
                        </p>
                    </div> <!-- END .custom-block -->
                    <div class="custom-block" data-aos="fade-up">
                        <center>
                            <h2 class="section-title">Gallery</h2>
                        </center>
                        <div class="row gutter-v2 gallery">
                            @foreach($gallerys as $gallery)
                                <div class="col-4">
                                    @foreach($gallery->images as $image)
                                        <a href="{{$image->name_path}}" class="gal-item" data-fancybox="gal"><img src="/{{$image->name_path}}" alt="Image" class="img-fluid"></a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- END .custom-block -->
                </div> <!-- /.col-lg-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection


