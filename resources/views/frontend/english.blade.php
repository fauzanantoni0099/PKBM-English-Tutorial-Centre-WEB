@extends('frontend.blank')
@section('content')

    <div class="untree_co-hero overlay" style="background-image: url('front/images/img-school-3-min.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center ">
                        <div class="col-lg-6 text-center ">
                            <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">English Tutorial Centre</h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                                <p>This is a great starting point for everyone who wants to improve their English skills.
                                    You will study with experienced instructors and in small groups.</p>
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
                            <h2 class="section-title">EGP (English for General Purposes)</h2>
                        </center>
                        <div class="custom-accordion" id="accordion_1">
                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">English for Young Leaner (EYL)</button>
                                </h2>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        Children are unique learners and they can easily imitate something such as language.
                                        To know a language, they need an environment surrounded by meaningful target
                                        languages. ETC as an experienced course has been keen in knowing and observing
                                        the characteristics of young students which include ways of thinking, attitudes, talents,
                                        language of learning, from young student participants. ETC really understands that
                                        children have short attention span. So we vary the techniques to break the boredom.
                                        Entrust ETC to improve your children interest in English.
                                    </div>
                                </div>
                            </div> <!-- .accordion-item -->

                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">English for Teen (ET) /Junior High School Student (ET)</button>
                                </h2>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        Teenagers need direction, stimulation, challenges, and variety. Our textbooks and
                                        resources equip students with the essential skills, materials and knowledge they need
                                        so that they excel in their exams, develop competence and confidence in English
                                        while staying motivated along the way.
                                    </div>
                                </div>
                            </div> <!-- .accordion-item -->
                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">English for Excellteen (EE)/Senior High School Student</button>
                                </h2>

                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        As an advanced program of ET, teenagers who have started to master basic English
                                        skills will be directed to focus more on several important aspects such as how to
                                        master conversations with various topics of interest by using correct and accurate
                                        patterns, this is very important because at this stage young people will be faced with
                                        various English tests both academically and non-academically. The learning system
                                        that is provided will be integrated with the material provided in schools with
                                        development that touches all skills in English
                                    </div>
                                </div>

                            </div> <!-- .accordion-item -->
                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">English for Adults</button>
                                </h2>

                                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_1">
                                    <div class="accordion-body">
                                        English for Adult provides special portions for students to more actively explore ideas
                                        that can be developed in the form of formal and informal communication. Besides
                                        that, ETC also provides more practical methods to help students integrate ideas both
                                        verbally and non-verbally. In this stage students will be given practical and applicative
                                        learning materials without ignoring the basic needs and targets of students in the
                                        learning process
                                    </div>
                                </div>

                            </div> <!-- .accordion-item -->

                        </div>
                    </div> <!-- END .custom-block -->
                    <div class="custom-block" data-aos="fade-up">
                        <center>
                        <h2 class="section-title mb-3">English for Specific Purposes (ESP)</h2>
                        </center>
                        <p>English for Specific Purposes (ESP) is one part of teaching English that covers a wide
                            range of scientific fields including academics, offices, business, hotels and tourism.
                            ETC offers flexibility that remains measurable in accordance with the field you want to
                            master. The characteristics of this ESP program are</p>
                        <ul class="list-unstyled ul-check primary">
                            <li>ESP is programmed to meet the specific needs of course participants</li>
                            <li>ESP uses the underlying methodology and the activities of the discipline it carries on</li>
                            <li>SESP emphasizes language suitable for these activities in terms of grammar, lexis,
                                registers, learning skills, discourse and genres; etc.</li>
                        </ul>

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


