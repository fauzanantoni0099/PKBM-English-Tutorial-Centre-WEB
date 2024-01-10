@extends('frontend.blank')
@section('content')

    <div class="untree_co-hero overlay" style="background-image: url('front/images/img-school-3-min.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center ">
                        <div class="col-lg-6 text-center ">
                            <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Elements</h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                                <p>Another free template by <a href="https://untree.co/" target="_blank" class="link-highlight">Untree.co</a>. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live.</p>
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
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How to download and register?</button>
                                </h2>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                                    </div>
                                </div>
                            </div> <!-- .accordion-item -->

                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How to create your paypal account?</button>
                                </h2>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                                    </div>
                                </div>
                            </div> <!-- .accordion-item -->
                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How to link your paypal and bank account?</button>
                                </h2>

                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.
                                    </div>
                                </div>

                            </div> <!-- .accordion-item -->

                        </div>
                    </div> <!-- END .custom-block -->
                    <div class="custom-block" data-aos="fade-up">
                        <center>
                            <h2 class="section-title">Gallery</h2>
                        </center>
                        <div class="row gutter-v2 gallery">
                            <div class="col-4">
                                <a href="images/gal_1.jpg" class="gal-item" data-fancybox="gal"><img src="/front/images/gal_1.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4">
                                <a href="images/gal_2.jpg" class="gal-item" data-fancybox="gal"><img src="/front/images/gal_2.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4">
                                <a href="images/gal_3.jpg" class="gal-item" data-fancybox="gal"><img src="/front/images/gal_3.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4">
                                <a href="images/gal_4.jpg" class="gal-item" data-fancybox="gal"><img src="/front/images/gal_4.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4">
                                <a href="images/gal_5.jpg" class="gal-item" data-fancybox="gal"><img src="/front/images/gal_5.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4">
                                <a href="images/gal_6.jpg" class="gal-item" data-fancybox="gal"><img src="/front/images/gal_6.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div> <!-- END .custom-block -->

                    <div class="custom-block" data-aos="fade-up">
                        <center>
                            <h2 class="section-title">Video</h2>
                        </center>

                        <a href="https://vimeo.com/342333493" data-fancybox class="video-wrap">
                            <span class="play-wrap"><span class="icon-play"></span></span>
                            <img src="/front/images/hero_bg.jpg" alt="Image" class="img-fluid rounded">
                        </a>
                    </div> <!-- END .custom-block -->

                    <div class="custom-block" data-aos="fade-up">
                        <h2 class="section-title mb-3">Check Unordered List</h2>

                        <ul class="list-unstyled ul-check primary">
                            <li>Far far away, behind the word</li>
                            <li>Far from the countries Vokalia</li>
                            <li>Separated they live in Bookmarksgrove</li>
                        </ul>

                    </div> <!-- END .custom-block -->

                </div> <!-- /.col-lg-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection


