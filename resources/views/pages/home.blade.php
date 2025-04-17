@extends('page_layout')
@section('content')
 <!-- Slider/Intro Section Start -->
<div class="intro11-slider-wrap section">
    <div class="intro11-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="intro11-section swiper-slide slide-1 slide-bg-1 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content text-left">
                    <h3 class="title-slider text-uppercase">Top Trend</h3>
                    <h2 class="title">2025 Car Trend</h2>
                    <p class="desc-content">Tận Hưởng những dòng xe nổi tiếng trong năm 2025</p>
                    <a href="product-details.html" class="btn flosun-button secondary-btn theme-color  rounded-0">Shop Now</a>
                </div>
                <!-- Intro Content End -->
            </div>
            <div class="intro11-section swiper-slide slide-2 slide-bg-1 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content text-left">
                    <h3 class="title-slider black-slider-title text-uppercase">Nổi bật</h3>
                    <h2 class="title">Mừng sinh nhật<br> 5 tuổi</h2>
                    <p class="desc-content">Hãy đên để trải nghiệm dịch vụ của chúng tôi</p>
                    <a href="product-details.html" class="btn flosun-button secondary-btn rounded-0">Shop Now</a>
                </div>
                <!-- Intro Content End -->
            </div>
        </div>
        <!-- Slider Navigation -->
        <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
        <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
        <!-- Slider pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- Slider/Intro Section End -->
<!--Categories Area Start-->
<div class="categories-area pt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="cat-1 col-md-4 col-sm-12 col-custom">
                <div class="categories-img mb-30">
                    <a href="#"><img src="{{ asset('public/fontend/assets/images/category/banner-left.png') }}" alt=""></a>
                    <div class="categories-content">
                        <h3>Potted Plant</h3>
                        <h4>18 items</h4>
                    </div>
                </div>
            </div>
            <div class="cat-2 col-md-8 col-sm-12 col-custom">
                <!-- <div class="row">
                    <div class="cat-3 col-md-7 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="public/fontend/assetsimages/category/home1-category-2.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cat-4 col-md-5 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="public/fontend/assetsimages/category/home1-category-3.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cat-5 col-md-4 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="public/fontend/assetsimages/category/home1-category-4.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cat-6 col-md-8 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="public/fontend/assetsimages/category/home1-category-5.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
                </div> -->
                <x-car-types-list />

            </div>
        </div>
    </div>
</div>
<!--Categories Area End-->
<!--Product Area Start-->
<div class="product-area mt-text-2">
    <div class="container custom-area-2 overflow-hidden">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">Wonderful gift</span>
                    <h3 class="section-title-3">Featured Products</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row product-row">
            <div class="col-12 col-custom">
                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">
                        <x-feature-product />
                        
                    </div>
                    <!-- Slider pagination -->
                    <div class="swiper-pagination default-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Product Area End-->
<!-- Product Countdown Area Start Here -->
<div class="product-countdown-area mt-text-3">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <h3 class="section-title-3">Deal of The Day</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <!--Countdown Start-->
            <div class="col-12 col-custom">
                <div class="countdown-area">
                    <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2022/12/24"></div>
                </div>
            </div>
            <!--Countdown End-->
        </div>
        <div class="row product-row">
            <div class="col-12 col-custom">
                <div class="item-carousel-2 swiper-container anime-element-multi product-area">
                    <div class="swiper-wrapper">
                    <x-feature-product />
                    </div>
                    <!-- Slider pagination -->
                    <div class="swiper-pagination default-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Countdown Area End Here -->
<!-- History Area Start Here -->
<div class="our-history-area pt-text-3">
    <div class="container">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">A little Story About Us</span>
                    <h2 class="section-title-large">Our History</h2>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <div class="col-lg-8 ms-auto me-auto">
                <div class="history-area-content pb-0 mb-0 border-0 text-center">
                    <p><strong>Captain America: Civil War Christopher Markus and Stephen McFeely see the Hulk as the game over moment.</strong></p>
                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus. Phasellus eu rhoncus dolor, vitae scelerisque sapien</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- History Area End Here -->
<!-- Banner Area Start Here -->
<div class="banner-area mt-text-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-custom">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style mb-30">
                    <div class="banner-img">
                        <a href="#">
                            <img src="public/fontend/assetsimages/banner/1-1.jpg" alt="">
                            <div class="overlay-1"></div>
                        </a>
                    </div>
                </div>
                <!--Single Banner Area End-->
            </div>
            <div class="col-md-4 col-custom">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style mb-30">
                    <div class="banner-img">
                        <a href="#">
                            <img src="public/fontend/assetsimages/banner/1-2.jpg" alt="">
                            <div class="overlay-1"></div>
                        </a>
                    </div>
                </div>
                <!--Single Banner Area End-->
            </div>
            <div class="col-md-4 col-custom">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style mb-30">
                    <div class="banner-img">
                        <a href="#">
                            <img src="public/fontend/assetsimages/banner/1-3.jpg" alt="">
                            <div class="overlay-1"></div>
                        </a>
                    </div>
                </div>
                <!--Single Banner Area End-->
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->
<!-- Testimonial Area Start Here -->
<div class="testimonial-area mt-text-2">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center">
                    <span class="section-title-1">We Love Our Clients</span>
                    <h3 class="section-title-3">What They’re Saying</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <div class="testimonial-carousel swiper-container intro11-carousel-wrap col-12 col-custom">
                <div class="swiper-wrapper">
                    <div class="single-item swiper-slide">
                        <!--Single Testimonial Start-->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img src="public/fontend/assetsimages/testimonial/testimonial1.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                                <div class="testimonial-author">
                                    <h6>Katherine Sullivan <span>Customer</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--Single Testimonial End-->
                    </div>
                    <div class="single-item swiper-slide">
                        <!--Single Testimonial Start-->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img src="public/fontend/assetsimages/testimonial/testimonial2.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                                <div class="testimonial-author">
                                    <h6>Alex Jhon <span>Customer</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--Single Testimonial End-->
                    </div>
                </div>
                <!-- Slider Navigation -->
                <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                <!-- Slider pagination -->
                <div class="swiper-pagination default-pagination"></div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End Here -->
<!-- Newsletter Area Start Here -->
<div class="news-letter-area gray-bg pt-no-text pb-no-text mt-text-3">
    <div class="container custom-area">
        <div class="row align-items-center">
            <!--Section Title Start-->
            <div class="col-md-6 col-custom">
                <div class="section-title text-left mb-35">
                    <h3 class="section-title-3">Send Newsletter</h3>
                    <p class="desc-content mb-0">Enter Your Email Address For Our Mailing List To Keep Your Self Update</p>
                </div>
            </div>
            <!--Section Title End-->
            <div class="col-md-6 col-custom">
                <div class="news-latter-box">
                    <div class="newsletter-form-wrap text-center">
                        <form id="mc-form" class="mc-form">
                            <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL">
                            <button id="mc-submit" class="btn rounded-0" type="submit">Subscribe</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Area End Here -->
<!-- Blog Area Start Here -->
<div class="blog-post-area mt-text-3">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">tin tức về xe</span>
                    <h3 class="section-title-3">Tin tức mới</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
       <x-newsview />
    </div>
</div>
<!-- Blog Area End Here -->
<!-- Brand Logo Area Start Here -->
<div class="brand-logo-area gray-bg pt-no-text pb-no-text mt-text-5">
    <div class="container custom-area">
        <div class="row">
            <div class="col-12 col-custom">
                <div class="brand-logo-carousel swiper-container intro11-carousel-wrap arrow-style-3">
                    <div class="swiper-wrapper">
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="public/fontend/assetsimages/brand/1.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="public/fontend/assetsimages/brand/2.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="public/fontend/assetsimages/brand/3.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="public/fontend/assetsimages/brand/4.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="public/fontend/assetsimages/brand/5.png" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- Slider Navigation -->
                    <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                    <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Logo Area End Here -->
@endsection