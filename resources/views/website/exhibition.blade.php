@extends('website.layouts.app')

@section('title', 'Services Page')

@section('content')



@php
$banner = getBanner('abouts');
$url=asset('/public/uploads/page_banners/' . $banner->banner_img);

@endphp


<div class="rts-banner-area rts-section-gap rts-breadcrumb-area  position-relative contact-bd">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-inner">
                    <span class="water-text">Services</span>
                    <h1 class="title">
                        Exhibitions & Events
                    </h1>
                    <div class="nav-area-navigation">
                        <a href="#">home</a>
                        <a class="current" href="#">Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="service-details-area rts-section-gapTop pb--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="service-details-main-wrapper-thumbnail">
                    <img class="w-100 service-img" src="https://dcnglobalexhibitions.com/images/slider-1.jpg" alt="service">
                </div>
                <div class="service-details-inner-area-wrapper">
                    <h4 class="title">Description Of The Service</h4>
                    <p class="disc">
                        Building a custom home is a dream for many, and at Elever, we believe that the journey to
                        achieving that dream should be as inspiring as the end result. Our Custom Home Building service
                        is designed with you in mind, combining expert craftsmanship, the
                        highest-quality materials, and a commitment to excellence in every phase of construction. From
                        the initial concept discussions to the final touches, our dedicated team is here to guide you
                        through the process, ensuring your
                        new home is a reflection of your vision, lifestyle, and unique personality.

                    </p>
                    <p class="disc">
                        The journey to a custom home begins with understanding. We start each project with an initial
                        consultation to learn about your goals, ideas, and preferences. During this stage, we take the
                        time to listen carefully to your vision. Are you seeking a sprawling
                        estate with traditional details, or perhaps a modern, minimalist design that emphasizes open
                        spaces and natural light? We discuss every aspect, from the overall structure to the small
                        details that make a house truly feel like
                        home.
                    </p>
                    <div class="service-main-wrapper-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">What’s Included:</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">No
                                    Compromises on Quality</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">Customized Solutions</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="inner-wrapper-tab-service-wrapper">
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>Personalized Design Consultation:</b> Our team of architects and
                                            designers collaborate with you to conceptualize a layout that suits your
                                            preferences, lifestyle, and budget. From layout to finishing touches,
                                            every detail is customized.
                                        </div>
                                    </div>
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>High-Quality Materials &amp; Craftsmanship:</b> We prioritize quality in
                                            every aspect of your home. With carefully sourced materials and skilled
                                            professionals, we ensure that each element, from foundation
                                            to finishing, meets our high standards.
                                        </div>
                                    </div>
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>Project Management &amp; Updates:</b> We take the stress out of building
                                            with a dedicated project manager, providing regular updates and transparent
                                            timelines so you’re informed at every stage.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <div class="inner-wrapper-tab-service-wrapper">
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>Personalized Design Consultation:</b> Our team of architects and
                                            designers collaborate with you to conceptualize a layout that suits your
                                            preferences, lifestyle, and budget. From layout to finishing touches,
                                            every detail is customized.
                                        </div>
                                    </div>
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>High-Quality Materials &amp; Craftsmanship:</b> We prioritize quality in
                                            every aspect of your home. With carefully sourced materials and skilled
                                            professionals, we ensure that each element, from foundation
                                            to finishing, meets our high standards.
                                        </div>
                                    </div>
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>Project Management &amp; Updates:</b> We take the stress out of building
                                            with a dedicated project manager, providing regular updates and transparent
                                            timelines so you’re informed at every stage.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                <div class="inner-wrapper-tab-service-wrapper">
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>Personalized Design Consultation:</b> Our team of architects and
                                            designers collaborate with you to conceptualize a layout that suits your
                                            preferences, lifestyle, and budget. From layout to finishing touches,
                                            every detail is customized.
                                        </div>
                                    </div>
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>High-Quality Materials &amp; Craftsmanship:</b> We prioritize quality in
                                            every aspect of your home. With carefully sourced materials and skilled
                                            professionals, we ensure that each element, from foundation
                                            to finishing, meets our high standards.
                                        </div>
                                    </div>
                                    <div class="single">
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="inner-content">
                                            <b>Project Management &amp; Updates:</b> We take the stress out of building
                                            with a dedicated project manager, providing regular updates and transparent
                                            timelines so you’re informed at every stage.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rts-call-to-action rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-area-service bg_image">
                    <div class="inner">
                        <h3 class="title">Ready to work together</h3>
                        <p class="disc">
                            Whether you have a project in mind and you’re looking for a reliable construction partner or
                            you’re looking to take the next step in your career, we want to hear from you!
                        </p>
                        <a href="#" class="rts-btn btn-primary">Make An Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="why-choose-us-area rts-section-gapBottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-12 pr--60 pr_md--0 pr_sm--0">
                <div class="reveal-item overflow-hidden aos-init">
                    <div class="reveal-animation reveal-end reveal-primary aos aos-init aos-animate"
                        data-aos="reveal-end">
                    </div>
                    <img src="images/222.png" alt="journey-area">
                    <div class="vedio-icone">
                        <a class="video-play-button play-video" href="#">
                            <span></span>
                        </a>
                        <div class="video-overlay">
                            <a class="video-overlay-close">×</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 pt_md--30 pt_sm--50">
                <div class="how-we-works-wrappers">
                    <div class="title-wrapper-left mb--50">
                        <span class="pre">How We Works</span>
                        <h2 class="title">
                            How To Work With Elever <br> Construction Builder
                        </h2>
                    </div>

                    <div class="single-choose-us-one">
                        <div class="icon">
                            <i class="fas fa-comments fa-2x"></i>
                            <span>1</span>
                        </div>
                        <div class="info-wrapper">
                            <h5 class="title">Consultation &amp; Planning</h5>
                            <p class="disc">We begin with a thorough consultation to understand your vision, budget,
                                and project goals. Our team works with you to develop a tailored plan</p>
                        </div>
                    </div>

                    <div class="single-choose-us-one">
                        <div class="icon">
                            <i class="fas fa-drafting-compass fa-2x"></i>
                            <span>2</span>
                        </div>
                        <div class="info-wrapper">
                            <h5 class="title">Design &amp; Pre-Construction</h5>
                            <p class="disc">We begin with a thorough consultation to understand your vision, budget,
                                and project goals. Our team works with you to develop a tailored plan</p>
                        </div>
                    </div>

                    <div class="single-choose-us-one">
                        <div class="icon">
                            <i class="fas fa-truck-loading fa-2x"></i>
                            <span>3</span>
                        </div>
                        <div class="info-wrapper">
                            <h5 class="title">Construction &amp; Delivery</h5>
                            <p class="disc">We begin with a thorough consultation to understand your vision, budget,
                                and project goals. Our team works with you to develop a tailored plan</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection