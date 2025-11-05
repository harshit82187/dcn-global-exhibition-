@extends('website.layouts.app')
@section('title', 'Global Presence - DCN Global Exhibition')
@section('content')
<div class="banner-area-one-start rts-section-gap" style="position: relative; background-image: url('{{ asset($global_presence->image) }}'); background-size: cover; background-position: center; height: 820px; max-width: 1820px; margin: auto; border-radius: 10px; overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12 mb-3">
                        <!-- banner inner content area -->
                        <div class="banner-inner-content-one">
                            <h1 class="title">{{ $global_presence->title ?? '' }}</h1>
                            <p class="disc ad_font_">Building Amazing Exhibition Stands For You Worldwide.</p>
                            <div class="button-wrapper">
                                <a href="{{ url('portfolio') }}" class="rts-btn btn-white">Our Portfolio</a>
                            </div>
                        </div>
                        <!-- banner inner content area end -->
                    </div>
                    <div class="col-lg-5 col-md-12 col-12">
                        <form id="" class="contact-form-area-wrapper">
                            <h4 class="title">Let’s Get in Touch</h4>
                            <div class="half-inpur-wrapper">
                                <div class="single">
                                    <input type="text" name="name" placeholder="Your Name">
                                </div>
                                <div class="single">
                                    <input type="text" name="email" placeholder="number" required="">
                                </div>
                            </div>
                            <div class="single">
                                <input name="subject" type="text" placeholder="Email Address...">
                            </div>
                            <textarea name="message" id="" placeholder="Type Your Message"></textarea>
                            <button type="submit" class="rts-btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="stats-section" id="stats">
    <div class="stat">
        <h2>2000</h2>
        <p>Projects Across the Globe</p>
    </div>
    <div class="stat">
        <h2>1500</h2>
        <p>Happy Clients</p>
    </div>
    <div class="stat">
        <h2>80</h2>
        <p>Associates Worldwide</p>
    </div>
    <div class="stat">
        <h2>100</h2>
        <p>Venues Worldwide</p>
    </div>
</div>
<div class="rts-blog-area rts-section-gap ad_only_global">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-style-two-center">
                    <h2 class="title d-none">Interior Today Exhibition Pvt. Ltd is the Best Exhibition Stand Builder</h2>
                    <p class="disc ad_font_">{!! $global_presence->description !!}</p>
                    <div class="button-wrapper justify-content-center mt-5">
                        <a href="{{ url('about-us') }}" class="rts-btn btn-white">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rts-blog-area rts-section-gap ad_only_global">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-style-two-center">
                    <h2 class="title">OUR SERVICES</h2>
                    <p class="disc ad_font_">
                        Interior Today Exhibition Pvt. Ltd is a leading Exhibition Stand Design Contractors in India, Europe, Dubai, Germany, Poland, USA, UK, UAE. Not just doing and building, but we like to think ourselves as the Event Architects who work on great passion, strong commitment and utmost professionalism.
                    </p>
                </div>
            </div>
        </div>
        <div class="row g-24 mt--40">
            @isset($services)
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-blog-three">
                            <div class="thumbnail">
                                <img src="{{ asset($service->home_page_img) }}" alt="{{ asset($service->home_page_img) }}">
                            </div>
                            <div class="inner-content-area">
                                <a href="javascript:void(0)">
                                    <h3 class="title">{{ $service->name }}</h3>
                                </a>
                                <div class="bottom-area">
                                    <p class="disc ad_font_">{!! $service->description !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            @endisset       
        </div>
    </div>
</div>
<div class="rts-team-area rts-section-gap ad_only_global">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-style-two-center">
                    <h2 class="title">OUR LATEST WORK</h2>
                    <p class="disc ad_font_">{!! $service->latest_work_info !!}  </p>
                </div>
            </div>
        </div>
        <div class="row g-24 mt--40">
            @isset($decoded_gallerys)
                @foreach($decoded_gallerys as $decoded_gallery)
                    <div class=" col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="single-team-style-five">
                            <div class="thumbnail">
                                <img src="{{ asset($decoded_gallery) }}" alt="{{ asset($decoded_gallery) }}">
                            </div>
                        </div>
                    </div>
                @endforeach 
            @endif         
        </div>
    </div>
</div>
<div class="service-abot-area rts-section-gap service-about-bg bg_image ad_only_global">
    <div class="container-120">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="service-about-wrapper">
                    <div class="title-three-left text-center">
                        <div class="title-style-two-center">
                            <h2 class="title text-white">WHY CHOOSE US</h2>
                            <p class="disc ad_font_ text-white">
                                We are a global custom trade show booth manufacturer company with wide networks to handle multiple shows in different location, manufacturing facilities all across the globe. Our existence all across Europe and Middle-east has aided wide number of our clients rooted in Europe, Germany, Dubai, France, Poland, Netherland, USA, UK, UAE, Italy, and Spain in hosting their dream-like custom exhibition stand.
                            </p>
                        </div>
                    </div>
                    <div class="row mt--15 g-24">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="single-service-sm">
                                <div class="icon">
                                    <i class="fa-solid fa-flag-checkered"></i>
                                </div>
                                <p>We Are the Pioneers</p>
                                <p class="disc ad_font_ text-white">
                                    Having more than 20 years’ experience, we pioneered and built our accreditation in the exhibition planning and building industry.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="single-service-sm">
                                <div class="icon">
                                    <i class="fa-solid fa-repeat"></i>
                                </div>
                                <p>One-Stop Solution</p>
                                <p class="disc ad_font_ text-white">
                                    We make it simple for you. We do everything in-house, from planning, designing, printing to installing, transporting and storing.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="single-service-sm">
                                <div class="icon">
                                    <i class="fa-solid fa-gem"></i>
                                </div>
                                <p>Working in your Budget</p>
                                <p class="disc ad_font_ text-white">
                                    Our aim is to fulfill your needs. It all begins with our team members to understand your requirements and budget.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="single-service-sm">
                                <div class="icon">
                                    <i class="fa-solid fa-shuffle"></i>
                                </div>
                                <p>Valuing Relationships</p>
                                <p class="disc ad_font_ text-white">
                                    We believe in relationship building. In each and every event that we do, we don’t do it alone, we do it together with you.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="why-choose-us-area rts-section-gap ad_only_global">
    <div class="container">
        <div class="title-three-left text-center pb--60">
            <div class="title-style-two-center">
                <h2 class="title">Why Choose Interior Today Exhibition Pvt. Ltd for Exhibition Stands Builder Services</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12 pr--60 pr_md--0 pr_sm--0">
                <p class="disc ad_font_">
                    Building a custom home is a dream for many, and at Elever, we believe that the journey to
                    achieving that dream should be as inspiring as the end result. Our Custom Home Building
                    service is designed with you in mind, combining expert craftsmanship, the highest-quality
                    materials, and a commitment to excellence in every phase of construction. From the initial
                    concept disc ad_font_ussions to the final touches, our dedicated team is here to guide you through
                    the process, ensuring your new home is a reflection of your vision, lifestyle, and unique
                    personality.
                </p>
            </div>
            <div class="col-xl-6 col-lg-12 pt_md--30 pt_sm--50">
                <div class="how-we-works-wrappers">
                    <div class="single-choose-us-one">
                        <div class="icon">
                            <i class="fa-solid fa-check"></i>
                            <span>1</span>
                        </div>
                        <div class="info-wrapper">
                            <h5 class="title">Experience and Expertise</h5>
                            <p class="disc ad_font_">With several years of experience in the Exhibition industry, we have honed our skills and expertise to handle Exhibition of all sizes and complexities.</p>
                        </div>
                    </div>
                    <div class="single-choose-us-one">
                        <div class="icon">
                            <i class="fa-solid fa-check"></i>
                            <span>2</span>
                        </div>
                        <div class="info-wrapper">
                            <h5 class="title">Customer-Centric Approach</h5>
                            <p class="disc ad_font_">We prioritize our customers and understand that each Exhibition is unique. Our personalized approach ensures that we cater to specific requirements and offer tailored solutions for a smooth Exhibition.</p>
                        </div>
                    </div>
                    <div class="single-choose-us-one">
                        <div class="icon">
                            <i class="fa-solid fa-check"></i>
                            <span>3</span>
                        </div>
                        <div class="info-wrapper">
                            <h5 class="title">Trained and Professional Team</h5>
                            <p class="disc ad_font_">Our team comprises skilled and dedicated professionals who are committed to providing the best Exhibition experience. They are courteous, efficient, and handle your possessions with the utmost care.</p>
                        </div>
                    </div>
                    <div class="single-choose-us-one">
                        <div class="icon">
                            <i class="fa-solid fa-check"></i>
                            <span>4</span>
                        </div>
                        <div class="info-wrapper">
                            <h5 class="title">Timely Delivery</h5>
                            <p class="disc ad_font_">We value your time and understand the importance of punctuality. Our team works diligently to ensure that your exhibition stands are delivered on schedule.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="service-abot-area rts-section-gap service-about-bg bg_image ad_only_global">
    <div class="container-120">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 pading-controler">
                <div class="service-about-wrapper">
                    <div class="title-three-left text-center">
                        <div class="title-style-two-center">
                            <h2 class="title text-white">An Invitation to Imagination</h2>
                            <p class="disc ad_font_ text-white">
                                Ready to Begin?
                            </p>
                            <div class="button-wrapper justify-content-center mt-5">
                                <a href="#" class="rts-btn btn-white">LET'S STRAT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
