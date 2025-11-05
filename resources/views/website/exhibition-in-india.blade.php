@extends('website.layouts.app')

@section('title', 'Services Page')

@section('content')

@php
$banner = getBanner('exhibition-in-india');
$url=asset('/public/uploads/page_banners/' . $banner->banner_img);
@endphp



<!-- <div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"> -->
<div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"
style="background-image: url('{{ $url }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-inner">
                    <span class="water-text">India</span>
                    <h1 class="title">
                        Exhibitions In India
                    </h1>
                    <div class="nav-area-navigation">
                        <a href="#">Home</a>
                        <a class="current" href="#">Trade Show Calender</a>
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
                    <h2 class="title">Exhibitions In India</h2>
                </div>
            </div>
        </div>
        <div class="row mt--15 g-24">
            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/webcontrol/uploads/Website-IMTEX-Forming-20221.jpg" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/Website-IMTEX-Forming-20221.jpg" alt="service">
                    </a>
                    <div class="content-wrapper">
                        <a href="service-details.html">
                            <h5 class="title">IMTEX 2022, Bangalore</h5>
                        </a>
                        <p class="disc">- Exhibitions In India</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/webcontrol/uploads/Defence-Expo-2_1666153662409_1666153666085_16661536660853.webp" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/Defence-Expo-2_1666153662409_1666153666085_16661536660853.webp" alt="service">
                    </a>
                    <div class="content-wrapper">
                        <a href="service-details.html">
                            <h5 class="title">IMTEX 2022, Bangalore</h5>
                        </a>
                        <p class="disc">- Exhibitions In India</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/webcontrol/uploads/krishithon6.jpg" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/krishithon6.jpg" alt="service">
                    </a>
                    <div class="content-wrapper">
                        <a href="service-details.html">
                            <h5 class="title">IMTEX 2022, Bangalore</h5>
                        </a>
                        <p class="disc">- Exhibitions In India</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/webcontrol/uploads/banner210.jpg" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/banner210.jpg" alt="service">
                    </a>
                    <div class="content-wrapper">
                        <a href="service-details.html">
                            <h5 class="title">IMTEX 2022, Bangalore</h5>
                        </a>
                        <p class="disc">- Exhibitions In India</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/webcontrol/uploads/Screenshot%202023-05-18%2018005512.png" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/Screenshot%202023-05-18%2018005512.png" alt="service">
                    </a>
                    <div class="content-wrapper">
                        <a href="service-details.html">
                            <h5 class="title">IMTEX 2022, Bangalore</h5>
                        </a>
                        <p class="disc">- Exhibitions In India</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rts-single-offer">
                    <a data-fancybox="gallery" href="https://dcnglobalexhibitions.com/webcontrol/uploads/infocomm%20india%2020225.png" class="thumbnail">
                        <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/infocomm%20india%2020225.png" alt="service">
                    </a>
                    <div class="content-wrapper">
                        <a href="service-details.html">
                            <h5 class="title">IMTEX 2022, Bangalore</h5>
                        </a>
                        <p class="disc">- Exhibitions In India</p>
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
                        <h3 class="title">The power of design help us to solve complex problems and cultivate business solutions.</h3>
                        <a href="#" class="rts-btn btn-primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection