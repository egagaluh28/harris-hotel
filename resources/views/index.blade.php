<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Harris Hotel</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon"
        href="{{ asset('https://www.discoverasr.com/content/dam/tal/common/assets/logos/brands/tauzia/harris/harris-logo-132x80.png') }}"
        type="image/x-icon">

    <!-- Flaticon -->
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-5.14.0.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Type Writer -->
    <link rel="stylesheet" href="assets/css/jquery.animatedheadline.css">
    <!-- Animate -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    {{-- menyambungkan leplet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
</head>

<body class="home-one">
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- main header -->
        <header class="main-header header-white">
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container container-1720 clearfix">

                    <div class="header-inner rel d-flex align-items-center justify-content-between">
                        <div class="logo-outer">
                            <div class="logo"><a href="/"><img
                                        src="https://www.discoverasr.com/content/dam/tal/common/assets/logos/brands/tauzia/harris/harris-logo-132x80.png"
                                        alt="Logo" title="Logo"></a></div>
                        </div>

                        <div class="nav-outer clearfix ml-auto"> <!-- Menggunakan ml-auto untuk menyusun ke kanan -->
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <div class="mobile-logo my-15">
                                        <a href="index.html">
                                            <img src="https://www.discoverasr.com/content/dam/tal/common/assets/logos/brands/tauzia/harris/harris-logo-132x80.png"
                                                alt="Logo" title="Logo">
                                        </a>
                                    </div>

                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-bs-toggle="collapse"
                                        data-bs-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/room">Room</a></li>
                                        <li><a href="/about">About</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                        </div>

                        <!-- Menu Button -->
                        <div class="menu-btns">
                            @auth
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}" class="theme-btn"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout <i class="far fa-angle-right"></i>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="theme-btn">Login <i
                                        class="far fa-angle-right"></i></a>
                            @endauth
                            <!-- menu sidebar -->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
        <!--Form Back Drop-->
        <div class="form-back-drop"></div>

        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->


        <!-- Slider Section Start -->
        <section class="main-slider-area bgc-black-with-lighting rel z-1">
            <div class="main-slider-active">
                <div class="slider-item">
                    <div class="container">
                        <div class="row justify-content-end align-items-center">
                            <div class="col-xl-3">
                                <div class="slider-content">
                                    <span class="sub-title"><i class="fal fa-arrow-right"></i> Welcome to
                                        Harris</span>
                                    <h1>Enjoy Vacations With <span>Harris Hotel</span></h1>
                                    <a href="/room" class="theme-btn">Explore Our Rooms <i
                                            class="far fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="slider-image">
                                    <img src="assets/images/slider/image 3.png" alt="Slider">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item">
                    <div class="container">
                        <div class="row justify-content-end align-items-center">
                            <div class="col-xl-3">
                                <div class="slider-content">
                                    <span class="sub-title"><i class="fal fa-arrow-right"></i> Welcome to
                                        Harris</span>
                                    <h1>Enjoy Vacations With <span>Harris Hotel</span></h1>
                                    <a href="/room" class="theme-btn">Explore Our Rooms <i
                                            class="far fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="slider-image">
                                    <img src="assets/images/slider/image 5.png" alt="Slider">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item">
                    <div class="container">
                        <div class="row justify-content-end align-items-center">
                            <div class="col-xl-3">
                                <div class="slider-content">
                                    <span class="sub-title"><i class="fal fa-arrow-right"></i> Welcome to
                                        Harris</span>
                                    <h1>Enjoy Vacations With <span>Harris Hotel</span></h1>
                                    <a href="/room" class="theme-btn">Explore Our Rooms <i
                                            class="far fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="slider-image">
                                    <img src="assets/images/slider/image 4.png" alt="Slider">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="main-slider-dots"></div>
                    </div>
                </div>
            </div>
            <div class="slider-shapes">
                <img class="shape circle" src="assets/images/shapes/slider-circle.png" alt="Shape">
            </div>
            <div class="bg-lines">
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </section>
        <!-- Slider Section End -->

        <section class="search-and-features-area bgc-light pb-50 rel z-1">
            <div class="container container-1550">
                <div class="search-filter-inner rel z-2">
                    <div class="section-title text-white mb-20 wow fadeInUp delay-0-2s">
                        <span class="sub-title mb-5">Booking Your Seat</span>
                        <h3>Find & Booked Your Seats</h3>
                    </div>
                    <div class="filter-item wow fadeInUp delay-0-3s">
                        <input type="text" onfocus="(this.type='date')" placeholder="Check In">
                    </div>
                    <div class="filter-item wow fadeInUp delay-0-4s">
                        <input type="text" onfocus="(this.type='date')" placeholder="Check Out">
                    </div>
                    <div class="filter-item wow fadeInUp delay-0-5s">
                        <select name="adults" id="adults">
                            <option value="adults">Adults</option>
                            <option value="adults1">1</option>
                            <option value="adults2">2</option>
                            <option value="adults3">3</option>
                        </select>
                    </div>
                    <div class="filter-item wow fadeInUp delay-0-6s">
                        <select name="children" id="children">
                            <option value="children">Children</option>
                            <option value="children1">1</option>
                            <option value="children2">2</option>
                            <option value="children3">3</option>
                        </select>
                    </div>
                    <button class="theme-btn style-two wow fadeInUp delay-0-7s">Search Now <i
                            class="far fa-angle-right"></i></button>
                </div>
            </div>

            <div class="bg-lines for-bg-white">
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </section>
        <!-- Rooms Area start -->
        <section class="rooms-area rel z-2">
            <div class="container">
                <div class="row justify-content-between align-items-center pb-20">
                    <div class="col-xl-5 col-lg-7">
                        <div class="section-title mb-40 wow fadeInLeft delay-0-2s">
                            <h2>Take A Look Our Harris Rooms and Hotel</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="theme-btn mb-40 wow fadeInRight delay-0-2s" href="/room-grid">Explore Rooms <i
                                class="fal fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($kamars as $kamar)
                        <div class="col-xl-4 col-md-6">
                            <div class="room-item style-two wow fadeInUp delay-0-2s">
                                <div class="image">
                                    <img src="{{ $kamar->image }}" alt="Room">
                                    <!-- Gunakan URL gambar dari model $kamar -->
                                    <a class="category"
                                        href="{{ route('room-details', ['id' => $kamar->id]) }}">{{ $kamar->tipe_kamar }}</a>
                                    <!-- Gunakan tipe_kamar atau informasi lainnya -->
                                </div>
                                <div class="content">
                                    <h4><a
                                            href="{{ route('room-details', ['id' => $kamar->id]) }}">{{ $kamar->nama }}</a>
                                    </h4>
                                    @if ($kamar->gambar)
                                        <!-- Pastikan ada gambar yang tersedia -->
                                        <img src="{{ $kamar->gambar }}" alt="{{ $kamar->nama }}">
                                    @else
                                        {{-- <p>Tidak ada gambar untuk kamar ini.</p> --}}
                                    @endif
                                    <ul class="blog-meta">
                                        <li>
                                            <i class="far fa-bed-alt"></i>
                                            <a href="#">Adults : {{ $kamar->person }}</a>
                                            <!-- Gunakan jumlah orang atau informasi lainnya -->
                                        </li>
                                    </ul>
                                    <p>{{ implode(' ', array_slice(str_word_count($kamar->deskripsi, 1), 0, 20)) }}</p>
                                    <!-- Gunakan deskripsi kamar atau informasi lainnya -->
                                    <div class="price"><span>Rp.
                                            {{ number_format($kamar->harga, 0, ',', '.') }}</span>/per night</div>

                                    <!-- Gunakan harga kamar -->
                                </div>
                                <a class="theme-btn" href="{{ route('room-details', ['id' => $kamar->id]) }}">Book
                                    Now
                                    <i class="fal fa-angle-right"></i></a>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="bg-lines for-bg-white">
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </section>
        <!-- Rooms Area end -->
        <div class="for-bg-and-shapes rel z-1">
            <!-- Counter Section Start -->
            <div class="counter-area pb-110 rpb-80 rel z-1">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-7 col-md-9">
                            <div class="section-title text-center mb-50 rmb-40 wow fadeInUp delay-0-2s">
                                <h2>We Provide Amazing Service to Enjoy Your Days</h2>
                            </div>
                        </div>
                    </div>
                    <div class="services-three-slider">
                        <div class="service-item-two wow fadeInUp delay-0-2s">
                            <span class="number">01</span>
                            <h4><a href="room-details.html">Fitness Center</a></h4>
                            <p>At vero eos accusamus simos blande praesente tatum</p>
                            <div class="icon">
                                <i class="flaticon-stationary-bike"></i>
                            </div>
                        </div>
                        <div class="service-item-two wow fadeInUp delay-0-3s">
                            <span class="number">02</span>
                            <h4><a href="room-details.html">Jacuzzi</a></h4>
                            <p>Libero tempore cum soluta to eligende optio cumque</p>
                            <div class="icon">
                                <i class="flaticon-jacuzzi"></i>
                            </div>
                        </div>
                        <div class="service-item-two wow fadeInUp delay-0-4s">
                            <span class="number">03</span>
                            <h4><a href="room-details.html">Swimming Pool</a></h4>
                            <p>Blinded by desirec that cannot foresies trouble bounde</p>
                            <div class="icon">
                                <i class="flaticon-swim"></i>
                            </div>
                        </div>
                        <div class="service-item-two wow fadeInUp delay-0-5s">
                            <span class="number">04</span>
                            <h4><a href="room-details.html">SPA Treatments</a></h4>
                            <p>At vero eos accusamus simos blande praesente tatum</p>
                            <div class="icon">
                                <i class="flaticon-relax"></i>
                            </div>
                        </div>
                        <div class="service-item-two wow fadeInUp delay-0-6s">
                            <span class="number">02</span>
                            <h4><a href="room-details.html">Jacuzzi</a></h4>
                            <p>Libero tempore cum soluta to eligende optio cumque</p>
                            <div class="icon">
                                <i class="flaticon-jacuzzi"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-lines for-bg-white">
                    <span></span><span></span>
                    <span></span><span></span>
                    <span></span><span></span>
                    <span></span><span></span>
                    <span></span><span></span>
                </div>
            </div>
            <!-- Counter Section End -->

            <div class="bg-color-and-shapes bgc-white">
                <div class="bg-lines">
                    <span></span><span></span>
                    <span></span><span></span>
                    <span></span><span></span>
                    <span></span><span></span>
                    <span></span><span></span>
                </div>
                <div class="wave-shapes"></div>
                <div class="wave-shapes-two"></div>
            </div>
        </div>



        <!-- Hotel Area start -->

        <!-- Hotel Area end -->
        <!-- Testimonials Area start -->
        <section class="testimonials-area py-130 rpy-100 rel z-1 bg-color-and-shapes bgc-light">
            <div class="container">
            <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-7 col-md-9">
                            <div class="section-title text-center mb-50 rmb-40 wow fadeInUp delay-0-2s">
                                <h2>Temukan Lokasi Hotel Harris Terdekat</h2>
                            </div>
                        </div>
                    </div>
                <div class="row align-items-center justify-content-center">
                    <div class="container">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="wave-shapes"></div>
            <div class="wave-shapes-two"></div>
        </section>
        <!-- Testimonials Area end -->
        {{-- maps --}}

        {{-- endmaps --}}
        <!-- footer area start -->
        <footer class="main-footer bgc-black pt-100 rel z-1">
            <div class="container">
                <div class="row justify-content-xl-between justify-content-between">
                    <div class="col-xl-3 col-lg-5 col-sm-6">
                        <div class="footer-widget widget_about wow fadeInUp delay-0-2s">
                            <div class="footer-logo mb-25">
                                <a href="index.html"><img
                                        src="https://www.discoverasr.com/content/dam/tal/common/assets/logos/brands/tauzia/harris/harris-logo-132x80.png"
                                        alt="Logo"></a>
                            </div>
                            <p>Nam libero tempore cum soluta nobis eseligendi optio cumque nihile impedit quo minus
                                maxime placeat facere</p>
                            <div class="social-style-one pt-10">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="footer-widget widget_nav_menu wow fadeInUp delay-0-4s">
                            <h4 class="footer-title">Quick Links</h4>
                            <ul class="list-style-one">
                                <li><a href="about.html">About company</a></li>
                                <li><a href="about.html">History</a></li>
                                <li><a href="about.html">Team Member</a></li>
                                <li><a href="blog.html">Latest News</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="footer-widget widget_nav_menu wow fadeInUp delay-0-4s">
                            <h4 class="footer-title">Features</h4>
                            <ul class="list-style-one">
                                <li><a href="room-details.html">Free Transportation</a></li>
                                <li><a href="room-details.html">GYM & Fitness Care</a></li>
                                <li><a href="room-details.html">SPA Treatment</a></li>
                                <li><a href="room-details.html">Food & Drinks</a></li>
                                <li><a href="room-details.html">Breakfast</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="footer-widget widget_newsletter wow fadeInUp delay-0-6s">
                            <h4 class="footer-title">Newsletter</h4>
                            <form action="#">
                                <input type="email" placeholder="Enter Address" required>
                                <button class="theme-btn">Subscribe <i class="far fa-angle-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom bgd-dark mt-40 pt-20 pb-5 rpt-25">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copyright-text">
                                <p>© 2023 <a href="index.html">Harris.</a> All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <ul class="footer-bottom-nav rpb-10">
                                <li><a href="about.html">Terms</a></li>
                                <li><a href="about.html">Privacy Policy</a></li>
                                <li><a href="faqs.html">FAQs</a></li>
                                <li><a href="about.html">Cookie Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-lines">
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </footer>


        <!-- Scroll Top Button -->
        <button class="scroll-top scroll-to-target" data-target="html"><span
                class="fas fa-angle-double-up"></span></button>

    </div>
    <!--End pagewrapper-->

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="assets/js/map.js"></script>


    <!-- Jquery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Appear Js -->
    <script src="assets/js/appear.min.js"></script>
    <!-- Slick -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- Image Loader -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Calendar -->
    <script src="assets/js/calendar.global.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!--  WOW Animation -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Custom script -->
    <script src="assets/js/script.js"></script>

</body>

</html>
