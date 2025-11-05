@extends('website.layouts.app')

@section('title', 'Services Page')

@section('content')



    <div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"  style="background-image: url('{{ asset($service->image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-inner">
                        <span class="water-text">Services</span>
                        <!-- <h1 class="title">{{ $service->name }}</h1> -->
                        <div class="nav-area-navigation">
                            <a href="#">home</a> >
                            <a class="current" href="#">Services</a> >
                            <a class="current" href="{{ route('service',$service->slug) }}">{{ $service->name }}</a>
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

                    <div class="service-details-inner-area-wrapper">
                        <h4 class="title">{{ $service->title }}</h4>
                        <p class="disc">
                            {!! strip_tags($service->description) !!}
                        </p>

                        <div class="service-main-wrapper-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach($decodedTabs as $index => $tab)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                                id="tab-{{ $index }}-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#tab-{{ $index }}"
                                                type="button"
                                                role="tab"
                                                aria-controls="tab-{{ $index }}"
                                                aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                            {{ $tab['title'] }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                @foreach($decodedTabs as $index => $tab)
                                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                        id="tab-{{ $index }}"
                                        role="tabpanel"
                                        aria-labelledby="tab-{{ $index }}-tab">

                                        <div class="inner-wrapper-tab-service-wrapper">
                                            {!! $tab['description'] !!}
                                        </div>
                                    </div>
                                @endforeach
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
                        <img class="w-100 service-img" src="{{ asset($service->image) }}"
                            alt="{{ asset($service->image) }}">
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
                            <span class="pre">Contact Us</span>
                            <!-- <h2 class="title">
                                {{ $service->worktitle }}
                            </h2> -->
                        </div>

                        <div class="single-choose-us-one">

                            <div class="info-wrapper">
                                <h5 class="title">Ready to make a significant impact at your next exhibition? Reach out to us to discuss how our double decker stands can elevate your brand's presence.</h5>
                                <p class="disc">
                                    <i class="fa fa-envelope"></i> hello@dcnglobalexhibitions.com<br>
                                    <i class="fa fa-phone"></i> +48 838881090, +91 9811143273<br>
                                    <i class="fa fa-map-marker"></i> Leśna 8, 62-023 Robakowo, Poland
                                </p>

                            </div>
                        </div>

                        <!-- <div class="single-choose-us-one">
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
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
