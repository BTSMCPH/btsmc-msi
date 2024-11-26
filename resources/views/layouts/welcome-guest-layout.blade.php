<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">
    <meta name="description"
        content="Providing service excellence in project management and professional business support to help you succeed.">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- reey font -->
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css">


    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css">
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css">
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css">
    <link rel="stylesheet" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" href="assets/vendors/hiredots-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/hiredots.css">
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <div class="topbar-one">
            <div class="container-fluid">
                <div class="topbar-one__inner">
                    <!--  <ul class="list-unstyled topbar-one__info">
                        <li class="topbar-one__info__item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info@btsmcph.com">info@btsmcph.com</a>
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="fas fa-map-marker"></i>
                            <a href="tel:+92(8800)-6930">30 Broklyn Golden Street. New York</a>
                        </li>
                    </ul> /.list-unstyled topbar-one__info -->
                    <div class="topbar-one__right">
                        <div class="topbar-one__nav">
                            <ul>
                                <li>
                                    <a href="about">About</a>
                                </li>
                                <li>
                                    <a href="#">Help</a>
                                </li>
                                <li>
                                    <a href="contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-one__social">
                            <!--<a href="https://twitter.com">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                <span class="sr-only">Twitter</span>
                            </a>-->
                            <a href="https://www.facebook.com/BTSMCMSI" target="_blank">
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="https://www.linkedin.com/in/btsmc-managing-solutions-inc-3864962b7/"
                                target="_blank">
                                <i class="fab fa-linkedin" aria-hidden="true"></i>
                                <span class="sr-only">Linkedin</span>
                            </a>
                            <!--<a href="https://instagram.com">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>-->
                        </div><!-- /.topbar-one__social -->
                    </div><!-- /.topbar-one__right -->
                </div><!-- /.topbar-one__inner -->
            </div>
        </div>

        <header class="main-header sticky-header sticky-header--normal">
            <div class="main-header__inner">
                <div class="main-header__logo">
                    <a href="/home">
                        <img src="assets/images/btsmc_logo.png" alt="Hiredots HTML" width="170">
                    </a>
                </div><!-- /.main-header__logo -->
                <a href="#" class="search-toggler main-header__search">
                    <i class="icon-magnifying-glass" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </a><!-- /.search-toggler -->
                <div class="main-header__menu">
                    <nav class="main-header__nav main-menu">
                        <ul class="main-menu__list">
                            <li>
                                <a href="home">Home</a>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="index-2.html">Home Two</a></li>
                                    <li><a href="index-3.html">Home Three</a></li>
                                    <li class="dropdown">
                                        <a href="#">Header Styles</a>
                                        <ul>
                                            <li><a href="index.html">Header One</a></li>
                                            <li><a href="index-2.html">Header Two</a></li>
                                            <li><a href="index-3.html">Header Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->

                            <li>
                                <a href="about">About</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Services</a>
                                <ul>
                                    <li><a href="#">Payroll Solutions</a></li>
                                    <li><a href="#">Human Resources Solution</a></li>
                                    <li><a href="#">Contracting & Sub-Contracting</a></li>
                                    <li> <a href="#">Visas & Work Permits</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="careers">Careers</a>

                            </li>
                            <!--<li class="dropdown">
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="team-details.html">Team Details</a></li>
                                    <li><a href="jobs.html">Jobs</a></li>
                                    <li><a href="history.html">History</a></li>
                                    <li><a href="faq.html">FAQs</a></li>
                                </ul>
                            </li>-->

                            <!--<li class="dropdown">
                                <a href="project.html">Projects</a>
                                <ul>
                                    <li><a href="project.html">Projects</a></li>
                                    <li><a href="project-details.html">Projects Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">News</a>
                                <ul>
                                    <li><a href="blog.html">News</a></li>
                                    <li><a href="blog-details.html">News Details</a></li>
                                </ul>
                            </li>-->
                            <li>
                                <a href="contact">Contact</a>
                            </li>
                        </ul>
                    </nav><!-- /.main-header__nav -->
                    <div class="main-header__call">
                        <i class="icon-telephone"></i>
                        <a href="tel:+632 88978632">+ 632 8897-8632</a>
                    </div>
                </div>
                <div class="main-header__link">
                    <a class="main-header__btn" href="/contact">Book <br> Appointment</a>
                </div>
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
            </div>
        </header>

        <footer class="main-footer background-black">
            <div class="main-footer__bg" style="background-image: url(assets/images/backgrounds/footer-bg.jpg);"></div>
            <!-- /.main-footer__bg -->
            <div class="main-footer__subscribe">
                <div class="container">
                    <div class="main-footer__subscribe__wrapper" style="display:none">
                        <div class="main-footer__subscribe__left">
                            <span class="main-footer__subscribe__icon"><i class="icon-message"></i></span>
                            <h3 class="main-footer__subscribe__title">Subscribe Now to Get <br>
                                Latest Updates</h3>
                        </div>
                        <div class="main-footer__subscribe__right">
                            <form action="#" data-url="MAILCHIMP_FORM_URL" class="main-footer__newsletter mc-form">
                                <input type="text" name="EMAIL" placeholder="Email address">
                                <button type="submit" class="fas fa-paper-plane">
                                    <span class="sr-only">submit</span><!-- /.sr-only -->
                                </button>
                            </form><!-- /.footer-widget__newsletter mc-form -->
                            <div class="mc-form__response"></div><!-- /.mc-form__response -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-5">
                            <div class="footer-widget footer-widget--about">
                                <a href="index.html" class="footer-widget__logo">
                                    <img src="assets/images/logo-light.png" width="200" alt="BTSMC MSI">
                                </a>
                                <p class="footer-widget__text">Providing service excellence in project management and
                                    professional business support to help you succeed.</p>
                                <!--<div class="footer-widget__author">
                                    <div class="footer-widget__author__img">
                                        <img src="assets/images/resources/footer-about-avata.png" alt="">
                                    </div>
                                    <div>
                                        <div class="footer-widget__author__info">
                                            <span class="footer-widget__author__tagline">Need Help?</span>
                                            <h3 class="footer-widget__author__title"><a href="contact.html">Book Appointment </a></h3>
                                        </div>
                                    </div>
                                </div>-->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 col-xl-2">
                            <div class="footer-widget footer-widget--links">
                                <h2 class="footer-widget__title">Explore</h2><!-- /.footer-widget__title -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="#">About BTSMC MSI</a></li>
                                    <li><a href="#">Meet Our Team</a></li>
                                    <li><a href="#">Our Clients</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 col-xl-2">
                            <div class="footer-widget footer-widget--contact">
                                <h2 class="footer-widget__title">Links</h2><!-- /.footer-widget__title -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="vacancies.php">Apply Now</a></li>
                                    <li><a href="#">Our Services</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 col-xl-3">
                            <div class="footer-widget footer-widget--time">
                                <h2 class="footer-widget__title">Contact</h2><!-- /.footer-widget__title -->
                                <p class="footer-widget__text">3F Unit 311-4 & 330-3 Spark Place Bldg. <br>P. Tuazon cor
                                    10th Ave., Brgy. Socorro,<br> Cubao, Quezon City, Philippines</p>
                                <!-- /.footer-widget__text -->
                                <ul class="list-unstyled footer-widget__info">
                                    <li><i class="fas fa-envelope"></i>General Inquiries: <a
                                            href="mailto:info@btsmcph.com">info@btsmcph.com</a></li>
                                    <li><i class="fas fa-envelope"></i>Recruitment: <a
                                            href="mailto:recruitment@btsmcph.com">recruitment@btsmcph.com</a></li>
                                    <li><i class="fas fa-phone-square"></i> <a href="tel:+632(8897)-8632">+632
                                            88978632</a></li>
                                </ul><!-- /.list-unstyled -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__top -->
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <div class="footer-widget__social">
                            <a href="https://www.facebook.com/BTSMCMSI" target="_blank">
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="https://www.linkedin.com/in/btsmc-managing-solutions-inc-3864962b7/"
                                target="_blank">
                                <i class="fab fa-linkedin" aria-hidden="true"></i>
                                <span class="sr-only">Linkedin</span>
                            </a>

                        </div><!-- /.footer-widget__social -->
                        <p class="main-footer__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> BTSMC MSI
                        </p>
                    </div><!-- /.main-footer__inner -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__bottom -->
        </footer><!-- /.main-footer -->

    </div><!-- /.page-wrapper -->



    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/btsmcp_logo.png" width="155"
                        alt=""></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@btsmcph.com">info@btsmcph.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+632 8897-8632">+632 8897-8632</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <!-- <a href="https://twitter.com">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>-->
                <a href="https://www.facebook.com/BTSMCMSI">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://www.linkedin.com/in/btsmc-managing-solutions-inc-3864962b7/" target="_blank">
                    <i class="fab fa-linkedin-p" aria-hidden="true"></i>
                    <span class="sr-only">Linkedin</span>
                </a>
                <!--<a href="https://instagram.com">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>-->
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here...">
                <button type="submit" aria-label="search submit" class="hiredots-btn hiredots-btn--base">
                    <span><i class="icon-magnifying-glass"></i></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>


    <script src="assets/vendors/jquery/jquery-3.7.0.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/imagesloaded/imagesloaded.min.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/jquery-circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/jquery-lettering/jquery.lettering.min.js"></script>
    <!-- template js -->
    <script src="assets/js/hiredots.js"></script>
</body>

</html>
