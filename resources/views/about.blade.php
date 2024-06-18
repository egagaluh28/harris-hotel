@extends('layout.main')
@section('container')
    <!-- Include jQuery, Owl Carousel, and Bootstrap 5 CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-utbXrMOL8PL8G+H0YQhrpcLTX2N4U1vDbiWxDbyfda2E9gU6Tf6LPYaqBr9Fyz3p8Cq3JldvhZlrxhJr7vCsHfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-6axCTr8j0xr2Dd/0kebC/Jt5lf5HXFLk1BS6qXK0qH0dtrO5APflZ5SId3nUp5y49RV5LOtzp0kQVTO6dXIoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU3jq5WIwAzmZHMj/BO5t9a1FWHPIu5dF7q2v" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7x7V8C+CFPEb66b4V6Dbbd9Tf4D5V4+glEZZwh0Z4YPgdyfBBXm+0zyLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-pwhW8sLUYp8xvmI5n4Go1QuDh3LxyGH0seG5gYeZB05Zd3BBsYd80MBFF0FxjD2t7RiMxD6rwk4J4LOzZ3VNNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9H9ErsphQBM1zUHB4D3p2Zp8rj6zPr4oh8hSHlf6kkoI7Q5fI6bW9j" crossorigin="anonymous"></script>

    <!-- Page Banner Start -->
    <section class="page-banner-area pt-170 rpt-110 pb-190 rpb-125 rel z-1 bgs-cover bgc-black text-center"
        style="background-image: url('https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/jakarta/harris-suites-fx-sudirman-jakarta/room-types/harris-bright/HFXS-booking-harrisbright1.jpg')">
        <div class="container">
            <div class="banner-inner text-white">
                <h1 class="page-title wow fadeInUp delay-0-2s">About</h1>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Page Banner End -->

    <!-- About Section Start -->
    <section class="about-section py-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content pr-30 rpr-0 wow fadeInUp delay-0-2s">
                        <div class="section-title mb-20">
                            <h2>About Hotel Harris</h2>
                        </div>
                        <p>Welcome to Hotel Harris, a vibrant and cozy hotel located in the heart of Jakarta. With its modern design and comfortable amenities, Hotel Harris offers a unique experience for both business and leisure travelers. Our rooms are designed with your comfort in mind, providing all the necessary amenities for a relaxing stay.</p>
                        <p>Enjoy our various facilities including a fitness center, swimming pool, and on-site dining options that cater to your culinary preferences. At Hotel Harris, we prioritize your satisfaction and aim to provide a memorable stay with exceptional service.</p>
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#videoModal">See Video</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-slider owl-carousel owl-theme wow fadeInUp delay-0-4s">
                        <div class="item">
                            <img src="https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/jakarta/harris-suites-fx-sudirman-jakarta/room-types/harris-bright/HFXS-booking-harrisbright2.jpg" alt="Hotel Harris Image 1" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Hotel Harris Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/ryyVT2zDL2s" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Initialize Owl Carousel -->
    <script>
        $(document).ready(function(){
            $(".about-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                nav: true,
                dots: true,
                animateOut: 'fadeOut'
            });
        });
    </script>
@endsection
