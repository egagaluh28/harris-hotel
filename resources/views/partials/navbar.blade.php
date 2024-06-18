<header class="main-header py-5">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container container-1720 clearfix">

            <div class="header-inner rel d-flex align-items-center justify-content-between">
                <div class="logo-outer">
                    <div class="logo"><a href="{{ url('/') }}"><img
                                src="{{ asset('https://www.discoverasr.com/content/dam/tal/common/assets/logos/brands/tauzia/harris/harris-logo-132x80.png') }}"
                                alt="Logo" title="Logo"></a></div>
                </div>


                <div class="nav-outer clearfix">
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
                            <ul class="navigation clearfix ml-auto">
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
                        <a href="{{ route('login') }}" class="theme-btn">Login <i class="far fa-angle-right"></i></a>
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
