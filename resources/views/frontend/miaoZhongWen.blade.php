@extends('frontend.blank')
@section('content')

    <div class="untree_co-hero overlay" style="background-image: url('front/images/img-school-3-min.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center ">
                        <div class="col-lg-6 text-center ">
                            <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Miao Zhong Wen</h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                                <p>Belajar Mandarin melibatkan karakter, nada, kosa kata, dan budaya Tiongkok. Praktik berbicara dan menulis membantu memperkuat kemampuan bahasa.</p>
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
                        <h2 class="section-title mb-3">Les Bahasa Mandarin di Miao Zhong Wen</h2>
                        </center>
                        <p>Tahukan kamu bahwa bahasa Mandarin memiliki jumlah penutur terbanyak kedua setelah bahasa
                            Inggris? Berdasarkan data tahun 2022, penutur bahasa Mandarin berjumlah 1,10
                            miliar, lho. Apakah Anda tertarik mempelajari bahasa Mandarin dan sedang mencari tempat les
                            yang tepat?
                        </p>
                        <p>Sebagai bahasa yang cukup tua, banyak negara yang menggunakan bahasa Mandarin.
                            Penggunaan bahasa Mandarin semakin meningkat sehingga banyak orang tertarik belajar bahasa
                            Mandarin. Belajar bahasa Mandarin bisa dilakukan melalui lembaga kursus yang terpercaya. Dan
                            Miao Zhong Wen adalah salah satu kursus bahasa Mandarin sudah berpengalaman mengajar
                            ratusan makasiswa dan pelajar sejak tahun 2021, sehingga kami bisa membantu proses belajar
                            bahasa Mandarin dengan lebih efektif dan terarah.
                        </p>
                        <p>Miao Zhong Wen Kursus Bahasa Mandarin Terpercaya di kota Padang</p>
                        <p>Kami menyediakan tutor-tutor yang sudah tersertifikasi dan memiliki kemampuan dalam bidang
                            bahasa Mandarin. Kamu bisa memilih kursus bahasa Mandarin online atau offline untuk
                            menunjang proses belajarmu lebih baik lagi.
                        </p>
                        <p>Kami menyediakan kursus bahasa Mandarin secara online dan offline dengan berbagai pilihan.
                            Tersedia kelas reguler, private 1-on-1 dan private group. Kelas reguler sangat cocok bagi kamu
                            yang ingin belajar dengan teman-teman baru dari berbagai latar belakang dan kota dimana saja
                        </p>
                        <p>Tersedia kelas reguler dengan waktu 2 x seminggu dan kelas intensif dengan waktu 4-5x
                            seminggu. Kelas reguler dibatasi maksimal 10 orang per kelasnya jadi kamu tetap mudah
                            berinteraksi dengan tutor saat belajar bahasa Mandarin.
                        </p>
                        <p>Kelas private 1-on-1 merupakan kelas eksklusif bagi kamu yang ingin jadwal kelasnya lebih
                            fleksible atau lebih fokus untuk meningkatkan kemampuan bahasa Mandarin. Interaksi penuh
                            secara intensif 1-on-1 dengan laoshi selama 1.45 jam per meeting.
                        </p>
                        <p>Sementara kelas private group sangat cocok bagi kamu yang ingin belajar bersama teman atau
                            kerabat terdekatmu secara eksklusif. Kamu bisa menentukan jumlah kelas 1-4 orang dengan
                            durasi kelas selama 2 jam per meeting.
                        </p>
                        <p>Percayakan proses belajar Bahasa mandarin yang interaktif, berkualitas, terarah dan terukur
                            kepada kami, Miao Zhong Wen</p>
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


