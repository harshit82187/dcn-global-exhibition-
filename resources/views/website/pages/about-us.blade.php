@extends('website.layouts.app')

@section('title', 'About Page')
    
@section('content')
  
@php
$banner = getBanner('abouts');
$url=asset('uploads/page_banners/' . $banner->banner_img);

@endphp
    


    <!-- <div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"> -->
    <div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative" 
    style="background-image: url('{{ $url }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-inner">
                        <span class="water-text">About</span>
                        <h1 class="title">
                            {{$banner->title}}                        
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="#">Home</a>
                            <a class="current" href="#">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-us-area-five rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-wrapper-area-five">
                        <div class="about-left-wrapper">
                            <span class="pre">Our Commitment To Community</span>
                            <h2 class="title">Your Reliable Choice for Booth Fabrication Services in UAE, EUROPE and ASIA. </h2>
                            <p class="disc">
                                Welcome to DCN Global Exhibitions! For over 30 years, DCN has been a trusted partner in crafting world-class exhibition stands and spaces across Europe, the Middle East, and India. As experienced exhibition stand designers and constructors, we bring creativity,
                                precision, and innovation to every project we undertake. Our extensive global experience allows us to tailor designs that captivate audiences, enhance brand visibility, and deliver unforgettable experiences. Whether you're
                                showcasing your brand on an international stage or launching in a new market, DCN Global Exhibitions ensures your presence stands out, with unmatched quality and attention to detail. Let’s create something extraordinary
                                together!
                            </p>
                           
                        </div>
                        <div class="right-thumbnail">
                            <img src="https://dcnglobalexhibitions.com/images/slider-1.jpg" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-story-area rts-section-gap bg-dark">
        <div class="container">
        <div class="section-title mb-5">
                        <!-- <span class="pre text-pre ">Our Story</span> -->
                        <h2 class="title text-center">Driven by Purpose, Inspired by Excellence</h2>
                    </div>
            <div class="row mb-5">
                <!-- Left Column: Image -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/10402472_1636318436588242_8272029370927214281_n60.jpg" alt="Our Story" class="img-fluid rounded-3 shadow-sm img-about">
                </div>

                <!-- Right Column: Mission, Vision, Values -->
                <div class="col-lg-6 m-auto">

                    <div class="mission mb-4">
                        <h4 class="text-pre">Mission Statement</h4>
                        <p>Our mission at DCN Global Exhibitions is to deliver innovative, impactful, and bespoke exhibition solutions that empower brands to shine on the global stage. With over three decades of experience across Europe, the Middle East,
                            and India, we are dedicated to transforming our clients' visions into immersive, engaging environments that captivate audiences and drive meaningful connections. We strive for excellence in design, construction, and execution,
                            ensuring that every project reflects our commitment to quality, creativity, and customer satisfaction.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <!-- Left Column: Image -->
              
                <!-- Right Column: Mission, Vision, Values -->
                <div class="col-lg-6 m-auto">

                <div class="vision mb-4">
                        <h4 class="text-pre">Vision Statement</h4>
                        <p>Our vision at DCN Global Exhibitions is to be the world’s leading provider of innovative and immersive exhibition solutions, recognized for transforming spaces into experiences that inspire and engage. We aim to set new standards
                            in design, sustainability, and client satisfaction, while expanding our global presence and delivering extraordinary results that drive the future of the exhibition industry.</p>
                    </div>

                 
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/10402472_1636318436588242_8272029370927214281_n60.jpg" alt="Our Story" class="img-fluid rounded-3 shadow-sm img-about">
                </div>

            </div>

            <div class="row mb-5">
                <!-- Left Column: Image -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/10402472_1636318436588242_8272029370927214281_n60.jpg" alt="Our Story" class="img-fluid rounded-3 shadow-sm img-about">
                </div>

                <!-- Right Column: Mission, Vision, Values -->
                <div class="col-lg-6 m-auto">

                   
        

                    <div class="values">
                        <h4 class="text-pre">Our Core Values</h4>
                        <ul class="list-unstyled mt-3">
                            <li><strong>Innovation:</strong> We continuously push the boundaries of design and construction to create unique, cutting-edge exhibition stands that captivate and inspire.</li>
                            <li><strong>Quality:</strong> We are committed to delivering the highest standards of craftsmanship and excellence in every project.</li>
                            <li><strong>Client-Centric Approach:</strong> Our clients' success is our priority—we listen, collaborate, and tailor every solution to their specific needs.</li>
                            <li><strong>Integrity:</strong> We operate with transparency, honesty, and respect in all our interactions.</li>
                            <li><strong>Sustainability:</strong> We use environmentally responsible practices and materials, minimizing waste across all processes.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

