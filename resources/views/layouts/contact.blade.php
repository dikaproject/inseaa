@extends('layouts.base')

@section('title','Contact')

@section('contact')
<!-- About Start -->
<div class="rn-breadcrumb-inner ptb--30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <h5 class="title text-center text-md-start">Contact With Us</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-list">
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item current">Contact With Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end page title area -->

<div class="rn-contact-top-area rn-section-gapTop bg_color--5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                <div class="section-title mb--30 text-center">
                    <h2 class="title">Quick Contact Address</h2>
                    <p class="description">There are many variations of passages of Lorem Ipsum available, <br> but
                        the majority have suffered alteration.</p>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                <div class="rn-address">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones">
                            <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                            <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z">
                            </path>
                        </svg>
                    </div>
                    <div class="inner">
                        <h4 class="title">Contact Phone Number</h4>
                        <p><a href="tel:+444555666777">+444 555 666 777</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                <div class="rn-address">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="inner">
                        <h4 class="title">Our Email Address</h4>
                        <p><a href="mailto:ask@inseaa.com">ask@inseaa.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                <div class="rn-address">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="inner">
                        <h4 class="title">Our Location</h4>
                        <p>Melbourne, Victoria, Australia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- login form -->
<div class="login-area message-area rn-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                <div class="connect-thumbnail">
                    <div class="left-image">
                        <img src="assets/images/contact/contact1.png" alt="Nft_Profile">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                <div class="form-wrapper-one registration-area">
                    <h3 class="mb--30">Contact Us</h3>
                    <form class="rwt-dynamic-form" id="contact-form" method="POST" action="mail.php">
                        <div class="mb-5">
                            <label for="contact-name" class="form-label">Your Name</label>
                            <input name="contact-name" id="contact-name" type="text">
                        </div>
                        <div class="mb-5">
                            <label for="contact-email" class="form-label">Email</label>
                            <input id="contact-email" name="contact-email" type="email">
                        </div>
                        <div class="mb-5">
                            <label for="subject" class="form-label">Subject</label>
                            <input id="subject" name="subject" type="text">
                        </div>
                        <div class="mb-5">
                            <label for="contact-message" class="form-label">Write Message</label>
                            <textarea name="contact-message" id="contact-message" rows="3"></textarea>
                        </div>
                        <div class="mb-5 rn-check-box">
                            <input id="condition" type="checkbox" class="rn-check-box-input">
                            <label for="condition" class="rn-check-box-label">Allow to all tearms & condition</label>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login form end -->


<div class="rn-contact-map-area position-relative rn-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <div class="col-12" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805190.2361601978!2d144.3937335953229!3d-37.970726050873445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20Victoria%2C%20Australia!5e0!3m2!1sid!2sid!4v1725430313914!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>


@endsection
