@extends('layout.main')
@section('container')
    <!-- Page Banner Start -->
    <section class="page-banner-area pt-170 rpt-110 pb-190 rpb-125 rel z-1 bgs-cover bgc-black text-center"
        style="background-image: url(https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/jakarta/harris-suites-fx-sudirman-jakarta/room-types/harris-bright/HFXS-booking-harrisbright1.jpg)">
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
            <span></span><span></span>
        </div>
    </section>
    <!-- Page Banner End -->


    <!-- Contact Form Area start -->


    <section class="testimonials-area py-130 rpy-100 rel z-1 bg-color-and-shapes bgc-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-page-form wow fadeInUp delay-0-2s">
                        <div class="section-title mb-15">
                            <h3>Send Us Message</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                        </div>
                        <form id="contactForm" class="contactForm" action="assets/php/form-process.php" name="contactForm"
                            method="post">
                            <div class="row gap-20 pt-15">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="" placeholder="Full name" required
                                            data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                                            value="" placeholder="Phone" required
                                            data-error="Please enter your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="" placeholder="Email" required
                                            data-error="Please enter your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="subject" name="subject" class="form-control"
                                            value="" placeholder="Subject" required
                                            data-error="Please enter your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="Message" required
                                            data-error="Please enter your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group pt-5 mb-0">
                                        <button type="submit" class="theme-btn">Send Message<i
                                                class="far fa-arrow-right"></i></button>
                                        <div id="msgSubmit" class="hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        <div class="wave-shapes"></div>
        <div class="wave-shapes-two"></div>
    </section>
    <!-- Contact Form Area end -->
@endsection
