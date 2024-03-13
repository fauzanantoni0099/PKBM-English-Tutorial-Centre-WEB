@extends('frontend.blank')
@section('content')

    <div class="untree_co-hero overlay" style="background-image: url('front/images/img-school-3-min.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center ">
                        <div class="col-lg-12 text-center ">
                            <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">FABKidZ</h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                                <p>Free School and Day Care
                                "One Stop Solution for
                                School-Age Children & Child Care"</p>
                            </div>

                            <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-secondary">Explore courses</a></p>

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
                            <h2 class="section-title">Accordion</h2>
                        </center>
                        <div class="custom-accordion" id="accordion_1">
                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">PreSchool</button>
                                </h2>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        Percayakan buah hati anda mengembangkan masa emas nya di fabkidz Pre school, kami menyediakan pengalaman yang komprehensif dan merangsang perkembangan
                                        potensi anak anda dan mempersiapkan keberhasilan mereka di pendidikan dasar nantinya, dengan program terpadu yang berbasis pendekatan olistik dan interdisipliner
                                        dengan mempromosikan perkembangan fisik, intelektual, sosial, emosial dan kreatif anak melalui penggabungan bahasa, matematika, sains, musik dan gerakan, serta konsep
                                        keterampilan seni dan kerajinan di usia dini untuk bekal pendidikan yang tepat dan bermakna
                                    </div>
                                </div>
                            </div> <!-- .accordion-item -->

                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">DayCare</button>
                                </h2>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        fabkidz day care tidak hanya mengasuh buah hati anda sepenuh hati tapi juga membantu untuk merangsang motorik kasa dan halus buah hati anda dengan pengaplikasian metode
                                        montessori yang sudah terbukti meningkatkan pertumbuhan buah hati anda dengan sempurna
                                    </div>
                                </div>
                            </div> <!-- .accordion-item -->
                        </div>
                    </div> <!-- END .custom-block -->
                    <div class="custom-block" data-aos="fade-up">
                        <center>
                        <h2 class="section-title mb-3">About</h2>
                        </center>
                        <p>Komitmen FABKIDZ adalah untuk menyediakan lingkungan yang aman, menyenangkan, dan penuh kasih sayang untuk buah hati Moms and Dads, mengingat cara terbaik untuk mengasuh dan mendidik si kecil adalah lewat permainan yang mengasyikkan. Itulah mengapa aktivitas buah hati anda di FABKIDZ akan banyak diisi dengan kegiatan-kegiatan happy learning yang juga difokuskan pada tumbuh kembang anak di banyak aspek dalam kehidupannya, seperti bernyanyi dan menari,  bermain musik, membuat prakarya sederhana, praktik dasar   kegiatan sehari hari,  dan  juga aktivitas-aktivitas fisik seperti lempar-tangkap bola, dan lainnya
                        </p>
                        <p>Semua aktivitas itu dilakukan si kecil di bawah bimbingan para pengasuh yang sangat profesional, penyayang, dan memahami dunia anak-anak. Selain itu para pengasuh yang  ada di Fabkidz Daycare Padang selalu berupaya untuk selalu kreatif dalam menciptakan aktivitas bermain sambil belajar yang menyenangkan.
                        </p>
                        <p>Secara garis besar, ada beberapa fokus utama yang ditawarkan oleh FABKIDZ Daycare Padang, yaitu untuk pengembangkan kemampuan eksplorasi dan pengenalan bahasa, melalui aktivitas-aktivitas seperti story telling dan mengenali bentuk serta tekstur. Fokus lainnya adalah pada pengembangan kemampuan motorik kasar dan halus, kemampuan berbahasa, dan pembentukan katrakter.  </p>
                        <p>Moms and Dads, dengan fasilitas super lengkap, mulai dari ruang kelas yang dekoratif, indoor playground yang dipenuhi mainan edukatif, kamar tidur yang nyaman, FABKIDZ Daycare Padang adalah pilihan terbaik bagi para orang tua yang membutuhkan jasa pengasuhan anak.
                        </p>
                        <p>Selain melakukan  beberapa aktivitas di daycare, Fabkidz Daycare Padang juga secara berkala mengadakan field trip ke objek-objek wisata edukatif.
                        </p>
                        <p>Semua itu kami berikan sebagai perwujudan komitmen yang tinggi akan pilihan Moms and Dads dalam mempercayai pengasuhan buah hati kepada Fabkidz Daycare Padang
                        </p>
                        <br>
                        <br>
                        <h5>😊🙏</h5>
                        <h5>Fabkidz</h5>
                        <h5>Happy Kiddos Happy us</h5>

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


