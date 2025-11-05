@extends('website.layouts.app')

@section('title', 'Services Page')

@section('content')

@php
$banner = getBanner('trade_show_in_europe');
$url=asset('/public/uploads/page_banners/' . $banner->banner_img);

@endphp



<!-- <div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"> -->
<div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"
style="background-image: url('{{ $url }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-inner">
                    <span class="water-text">Europe</span>
                    <h1 class="title">
                        Trade Shows in Europe
                    </h1>
                    <div class="nav-area-navigation">
                        <a href="#">Home</a>
                        <a class="current" href="#">Trade Shows in Europe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rts-offer-provide-section rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-mid-wrapper-home-two" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                    <h2 class="title">Trade Shows in Europe</h2>
                </div>
            </div>
        </div>
        <div class="row mt--15 g-24">
            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/webcontrol/uploads/heimtextil2.jpg" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/heimtextil2.jpg" alt="service">
                    </a>
                    <div class="content-wrapper">
                        <a href="service-details.html">
                            <h5 class="title">
                                Heimtextil 2023
                            </h5>
                        </a>
                        <p class="disc">
                            - Trade Shows in Europe
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/portfolio/compress/1.jpg" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/portfolio/compress/1.jpg" alt="service">
                    </a>
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
                        <h3 class="title">The power of design help us to solve complex problems and cultivate business solutions.</h3>
                        <a href="#" class="rts-btn btn-primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection