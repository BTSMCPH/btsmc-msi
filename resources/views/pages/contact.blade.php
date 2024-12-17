<x-welcome-guest-layout>
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="page-header__shape"><img src="assets/images/shapes/page-header-shape.png" alt="hiredots"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">Contact</h2>
            <ul class="hiredots-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>Contact</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <section class="contact-one pt-100 pb-100">
        <div class="container">
            <div class="contact-one__inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-one__content">
                            <div class="sec-title text-@@textAlign">

                                <h6 class="sec-title__tagline">Contact us</h6><!-- /.sec-title__tagline -->

                                <h3 class="sec-title__title">Feel Free to Get in Touch <br> with BTSMC MSI</h3>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="contact-one__text"></p><!-- /.contact-one__text -->
                            <ul class="list-unstyled contact-one__info">
                                <li class="contact-one__info__item">
                                    <div class="contact-one__info__icon">
                                        <i class="icon-phone-call-1"></i>
                                    </div><!-- /.contact-one__info__icon -->
                                    <div class="contact-one__info__content">
                                        <!--<p class="contact-one__info__text">Have Question?</p>
                                             /.contact-one__info__text -->
                                        <h4 class="contact-one__info__title"><a href="tel:+632(8897)-8632">+632
                                                (8897)-8632</a></h4><!-- /.contact-one__info__title -->
                                    </div><!-- /.contact-one__info__content -->
                                </li>
                                <li class="contact-one__info__item">
                                    <div class="contact-one__info__icon">
                                        <i class="icon-message"></i>
                                    </div><!-- /.contact-one__info__icon -->
                                    <div class="contact-one__info__content">
                                        <!-- <p class="contact-one__info__text">Write Email </p>
                                             /.contact-one__info__text -->
                                        <h4 class="contact-one__info__title"><a
                                                href="mailto:info@btsmcph.com">info@btsmcph.com</a></h4>
                                    </div>
                                </li>
                                <li class="contact-one__info__item">
                                    <div class="contact-one__info__icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="contact-one__info__content">
                                        <!--<p class="contact-one__info__text"></p>  /.contact-one__info__text -->
                                        <h4 class="contact-one__info__title">3F Unit 311-4 & 330-3 Spark Place Bldg. P.
                                            Tuazon cor 10th Ave., Brgy. Socorro, Cubao, Quezon City, Philippines</a>
                                        </h4><!-- /.contact-one__info__title -->
                                    </div><!-- /.contact-one__info__content -->
                                </li>
                            </ul>
                        </div><!-- /.contact-one__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="contact-one__left">

                            {{-- @include('success-message') --}}
                            <!-- Success or Error Message -->
                            <div id="contact-form-message" style="display: none;"></div>
                            <form method="POST" action="{{ route('contact.send') }}"
                                class="contact-one__form contact-form-validated form-one background-base wow fadeInUp"
                                data-wow-duration="1500ms" id="contact-form">
                                @csrf

                                <div style="display:none;">
                                    <input type="text" name="website" value="" />
                                </div>
                                <div class="form-one__group">
                                    <div class="form-one__control form-one__control--full">
                                        <input type="text" name="name" placeholder="Your name">
                                    </div>
                                    <div class="form-one__control form-one__control--full">
                                        <input type="email" name="email" placeholder="Email address">
                                    </div>
                                    <div class="form-one__control form-one__control--full">
                                        <input type="text" name="phone" placeholder="Phone number">
                                    </div>

                                    <div class="form-one__control form-one__control--full">
                                        <textarea name="message" placeholder="Write a message"></textarea>
                                    </div>
                                    <div class="form-one__control form-one__control--full">
                                        <button type="submit" class="hiredots-btn hiredots-btn--white">
                                            <span>Send a message</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.contact-one__inner -->
        </div><!-- /.container -->
    </section><!-- /.contact-one -->

    <section class="contact-map">
        <div class="container">
            <div class="google-map google-map__contact">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7721.329361487196!2d121.05649500000001!3d14.618168000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7de7e8947e1%3A0x8364cdf75fb26879!2sBTSMC%20Managing%20Solutions%2C%20Inc.%20-%20formerly%20Brunel%20Technical%20Services!5e0!3m2!1sen!2sus!4v1728529382258!5m2!1sen!2sus"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- /.google-map -->
        </div><!-- /.container-fluid -->
    </section><!-- /.contact-map -->
</x-welcome-guest-layout>
