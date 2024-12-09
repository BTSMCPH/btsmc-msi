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
                    <li class="{{ request()->routeIs('welcome') ? 'current' : '' }}">
                        <a href="{{ route('welcome') }}"> {{ __('Home') }} </a>
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

                    <li class="{{ request()->routeIs('about') ? 'current' : '' }}">
                        <a href="{{ route('about') }}" >
                            {{ __('About') }}
                        </a>
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

                    <li class="{{ request()->routeIs('career') ? 'current' : '' }}">
                        <a href="{{ route('career') }}"> {{ __('Careers') }} </a>

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
                    <li class="{{ request()->routeIs('career') ? 'current' : '' }}">
                        <a href="contact"> {{ __('Contact') }} </a>
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
