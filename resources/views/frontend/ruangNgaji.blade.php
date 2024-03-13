@extends('frontend.blank')
@section('content')

    <div class="untree_co-hero overlay" style="background-image: url('front/images/img-school-3-min.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center ">
                        <div class="col-lg-6 text-center ">
                            <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Ruang Ngaji</h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                                <p>Ruang ini menciptakan lingkungan yang kondusif untuk memfasilitasi proses pembelajaran Al-Qur'an dan ilmu agama Islam.</p>
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
                        <p>Hampir semua berpendapat bahwa interaksi anak dengan al-qur’an harus dilakukan sejak usia dini. Bahkan didalam kandungan ibu pun sudah boleh diajarkan membaca Al Qur’an dengan cara diperdengarkan. Islam memberikan perhatian yang sangat besar tentang proses membaca sebagaimana wahyu pertama pun adalah iqra. Rasulullah Muhammad juga menaruh perhatian besar pada kegiatan membaca, bahkan para tawanan badar pun boleh bebas ketika mereka sudah berhasil mengajarkan beberapa sahabat agar terbebas dari buta huruf Al-Qur’an. Didalam hadist dan ayat al-qur’an, secara eksplisit perintah mengajarkan sholat dilakukan di usia 7 tahun, tetapi tidak ada yang secara eksplisit menyatakan kapan anak-anak seharusnya belajar membaca al-qur’an. Mengenalkan iqra pada anak dapat dimulai sejak anak pada usia lima sampai dengan enam tahun memang bukanlah sesuatu yang salah, namun mengenalkan sejak usia lebih dini lagi maka bisa menghasilkan hal yang lebih positif.
                        </p>
                        <p>
                            Ruang Mengaji Mumtaz,  adalah les mengaji Iqra' dan Alquran yang diperuntukkan untuk buah hati anda yang didesain dengan memakai pedoman dan petunjuk yang sesuai dengan kaidah agama.
                            Di Ruang Mengaji Mumtaz, kami menyediakan berbagai variasi dalam memaksimalkan buah hati anda dalam mempelajari dan memahami huruf Iqra' dan bacaan Al Quran, tidak saja itu sebagai penunjang, kami juga menyeimbangkan teknis pengajaran baca tulis Iqra' dan alQuran dengan berbagai cerita cerita Islami yang sangat memotivasi, permainan edukatif, interaktif, dan aplikatif dengan basis religius.
                        </p>
                        <p>
                            Saat ini Ruang Mengaji Mumtaz  menyediakan para ustadz/ustadzah yang akan membimbing buah hati anda dengan ramah dan telaten. Mereka datang dengan usia yang relatif muda dan menyukai dunia pendidikan serta telah melewati serangkaian tes dengan tujuan agar kami bisa memberikan pelayanan dan pengajaran yang maksimal, terarah dan terukur, sehingga Moms and Dads merasa nyaman telah mempercayakan kebutuhan anak anak dalam baca tulis Iqra' dan mempelajari bacaan  Al Quran kepada kami.
                        </p>
                        <p>Semoga, pengalaman Ruang Mengaji Mumtaz yang telah membersamai banyak siswa dalam belajar membaca Iqra' dan al Qur’an dengan metode yang menarik, juga bisa menjadi wasilah bagi buah hati Moms and Dads untuk bisa membaca Iqra' dan  Al Qur’an dengan baik dan benar
                        </p>
                        <p>Ayo Moms and Dads, segera hubungi kami, untuk mendapat informasi yang lebih komprehensif sehingga Moms and Dads bisa merasa puas dan nyaman untuk akhirnya mempercayakan pengajaran membaca, menulis, dan memahami  Iqra' dan Alquran kepada kami
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


