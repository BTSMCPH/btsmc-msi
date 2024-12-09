<x-welcome-guest-layout>
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="page-header__shape"><img src="assets/images/shapes/page-header-shape.png" alt="hiredots"></div>
        <!-- /.page-header__bg -->
        <div class="container" style="margin-top:-100px;">
            <h2 class="page-header__title" style="margin-bottom:8px">Why Join Us?</h2>
            <div style="width:360px">
                <p style="color: #fff; font-size: 19px;">Make an impact. Grow your career. Be part of something big.
                    Join our team at BTSMC Managing Solutions, Inc. and help us shape the future. Explore our open
                    positions today!</p>
            </div>
            <ul class="hiredots-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>Vacancies</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="faq-page-search" style="padding: 25px 0;">
        <div class="container">
            <div class="faq-page-search__inner wow fadeInUp" data-wow-duration="1500ms">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center sec-title">

                            <h6 class="sec-title__tagline"></h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title">WE ARE LOOKING FOR</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->

                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.faq-page-search__inner -->
        </div><!-- /.container -->
    </section><!-- /.faq-page-search -->


    <section class="faq-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="faq-page__contact background-base">
                        <h3 class="faq-page__contact__title">Have Questions?
                            Call or Email!</h3>
                        <!-- /.faq-page__contact__title -->
                        <div class="faq-page__contact__text">
                            <p class="faq-page__contact__number">
                                <i class="fas fa-phone-square" style="padding-right:5px"></i>Phone: <a
                                    href="tel:+63 9853661384">+63 9853661384 (TNT)</a><br>
                                <i class="fas fa-phone-square" style="padding-right:5px"></i>Phone: <a
                                    href="tel:+63 9567494666">+63 9567494666 (Globe)</a><br>
                                <i class="fas fa-envelope" style="padding-right:5px"></i>Email: <a
                                    href="mailto:recruitment@btsmcph.com">recruitment@btsmcph.com</a>

                            </p>
                            <!-- /.faq-page__contact__number -->
                        </div>
                        <div class="faq-page__contact__text" style="margin-top:20px">
                            <p class="faq-page__contact__number">
                                Follow us on:<br>
                                <a href="https://www.facebook.com/BTSMCMSI" target="_blank"><i class="fab fa-facebook"
                                        style="padding-right:10px; font-size:35px"></i></a>
                                <a href="https://www.linkedin.com/in/btsmc-managing-solutions-inc-3864962b7/"
                                    target="_blank"><i class="fab fa-linkedin"
                                        style="padding-right:5px; font-size:35px"></i></a>

                            </p>
                        </div>
                        <!-- /.faq-page__contact__text -->
                    </div>
                    <div class="faq-page__contact__img">
                        <img src="assets/images/resources/faq-1-img.jpg" alt="faq">
                    </div>
                </div><!-- /.col-lg-4 col-xl-3 -->
                <div class="col-lg-8">
                    <div class="faq-page__accordion hiredots-accrodion" data-grp-name="hiredots-accrodion">
                        @foreach($job_lists as $category_name => $jobs)
                            <h3 class="service-details__title" style="font-size:20px;color:#0b2f81">{{ $category_name }}</h3>
                            @foreach($jobs as $job)
                                <div class="accrodion" style="margin-left:40px;margin-bottom:25px">
                                    <div class="accrodion-title">
                                        <h4>
                                            {{ $job['job_title'] }}
                                            <span class="accrodion-title__icon"></span><!-- /.accrodion-title__icon -->
                                        </h4>
                                    </div><!-- /.accordian-title -->
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p><i class="fas fa-briefcase" style="padding-right:5px;"></i> On-the-job training</p>
                                            <p><i class="fas fa-map-marker" style="padding-right:5px;"></i> Cubao, Quezon City</p>
                                            <p><i class="fas fa-calendar" style="padding-right:5px;"></i> Monday-Friday (7:00 AM - 4:00 PM)</p>
                                            <p style="padding-top: 15px; font-size: 20px;">Job Requirements</p>
                                            <ul style="margin-left:5px">
                                                <li>Currently taking BS Psychology, BS Business Administration Major in Human Resource Management or related field</li>
                                                <li>Proficient in MS Office</li>
                                                <li>Able to demonstrate professional work ethic</li>
                                                <li>Able to maintain flexible work schedule</li>
                                                <li>Outstanding written and verbal communication skills</li>
                                                <li>Good interpersonal and organizational skills</li>
                                                <li>Can start immediately</li>
                                            </ul>
                                            <p style="font-size: 20px;">Job Description</p>
                                            <ul style="margin-left:5px">
                                                <li>Gathers and organizes job applications</li>
                                                <li>Posts job advertisements to various job portals (Jobstreet, Indeed, etc.)</li>
                                                <li>Assist with the recruitment, screening, and interviewing of applicants for various employment positions.</li>
                                                <li>Schedule interviews in collaboration with the Project Leads, Recruitment Team, and candidates.</li>
                                                <li>Checking talent pool names against any candidate database to avoid candidate endorsement duplication.</li>
                                            </ul>
                                            <p style="text-align:center">
                                                <a href="#" class="hiredots-btn hiredots-btn--base">
                                                    <span>Click here to Apply</span>
                                                </a>
                                            </p>
                                        </div><!-- /.accordian-content -->
                                    </div>
                                </div><!-- /.accordian-item -->
                            @endforeach
                        @endforeach

                        <!-- Recruitment Section -->
                        <div style="padding-top:60px">
                            <h3 class="service-details__title" style="font-size:20px;color:#0b2f81">RECRUITMENT AND SELECTION PROCESS</h3>
                            <p class="service-details__text" style="font-size:16px; text-align:justify">
                                Our recruitment and selection process is designed to attract and hire top talent who share our company values and contribute to our success.
                                We advertise open positions on our company website, major job boards, and social media platforms, actively promoting our inclusive and innovative work environment.
                            </p>
                        </div>
                    </div>
                </div><!-- /.col-lg-8 col-xl-9 -->
            </div><!-- /.row -->

        </div><!-- /.container -->
    </section><!-- /.faq-page-accordion -->
</x-welcome-guest-layout>
