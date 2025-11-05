@extends('website.layouts.app')

@section('title', 'Portfolio-details')

@section('content')

    <div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"
        style="background-image: url('https://test.pearl-developer.com/dcnglobal/public/uploads/page_banners/1746007702.webp')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-inner">
                        <span class="water-text">Project Details</span>
                        <h1 class="title">
                            Your Reliable Choice for Booth Fabrication Services in UAE, EUROPE, and ASIA
                        </h1>
                        <div class="nav-area-navigation">
                            <a href="#">Home</a>
                            <a class="current" href="#">Project Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project-details-wrapper-image-top rts-section-gap">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-8">
                    <div class="thumbnail">
                        <a data-fancybox="gallery"
                            href="https://dcnglobalexhibitions.com/webcontrol/uploads/@DCM%20SHRIRAM%20@%20AGROTECH%2020184.jpg">
                            <img class="main-img"
                                src="https://dcnglobalexhibitions.com/webcontrol/uploads/@DCM%20SHRIRAM%20@%20AGROTECH%2020184.jpg"
                                alt="portfolio">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 pl--20 pl_md--0 pl_sm--0">
                    <div class="thumbnail mb--10 mt_md--10 mt_sm--15">
                        <a data-fancybox="gallery"
                            href="https://dcnglobalexhibitions.com/webcontrol/uploads/@Western%20refridgeration,%20aahar%2020125.jpg">
                            <img class="sub-img"
                                src="https://dcnglobalexhibitions.com/webcontrol/uploads/@Western%20refridgeration,%20aahar%2020125.jpg"
                                alt="portfolio">
                        </a>
                    </div>
                    <div class="thumbnail">
                        <a data-fancybox="gallery"
                            href="https://dcnglobalexhibitions.com/webcontrol/uploads/@czech%20repupblic%20@%20aeroindia%20show%2020196.jpg">
                            <img class="sub-img"
                                src="https://dcnglobalexhibitions.com/webcontrol/uploads/@czech%20repupblic%20@%20aeroindia%20show%2020196.jpg"
                                alt="portfolio">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="container">
            <div class="row g-0">
                <div class="col-lg-8">
                    @if ($portfolio->images->count() > 0)
                        <div class="thumbnail">
                            <a data-fancybox="gallery" href="{{ asset($portfolio->images[0]->files) }}">
                                <img class="main-img" src="{{ asset($portfolio->images[0]->files) }}" alt="portfolio">
                            </a>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4 pl--20 pl_md--0 pl_sm--0">
                    @foreach ($portfolio->images->skip(1)->take(2) as $image)
                        <div class="thumbnail mb--10 mt_md--10 mt_sm--15">
                            <a data-fancybox="gallery" href="{{ asset($image->files) }}">
                                <img class="sub-img" src="{{ asset($image->files) }}" alt="portfolio">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}






        <div class="container mt--30">
            <div class="row mb--40">
                <div class="col-lg-12">
                    <div class="single-project-info-wrapper-inner">
                        <h4 class="title">Quality-Driven Approach to Building Projects</h4>
                        <p class="disc">
                            Netus platea nec commodo tincidunt felis orci iaculis facilisi. Molestie etiam magnis rutrum
                            penatibus eros non accumsan erat nulla, convallis rhoncus natoque lacinia class viverra
                            platea cubilia, netus luctus tristique quam habitasse taciti nullam fringilla nostra netus
                            class felis magnis sed consequat orci,
                        </p>
                        <div class="row g-4">
                            <div class="col-lg-2">
                                <div class="single-project-info">
                                    <span>Client:</span>
                                    <p>RC Builders</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single-project-info">
                                    <span>Location:</span>
                                    <p>Denver, CO, USA</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single-project-info">
                                    <span>Client:</span>
                                    <p>RC Builders</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single-project-info">
                                    <span>Project Year:</span>
                                    <p>15 Oct 2024</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single-project-info">
                                    <span>Duration: </span>
                                    <p>5Years, 3Months</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single-project-info">
                                    <span>Price:</span>
                                    <p>$18 Million</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-details-content-bottom">
                        <p class="disc">
                            Netus platea nec commodo tincidunt felis orci iaculis facilisi. Molestie etiam magnis rutrum
                            penatibus eros non accumsan erat nulla, convallis rhoncus natoque lacinia class viverra
                            platea cubilia, netus luctus tristique quam habitasse taciti nullam fringilla nostra netus
                            class felis magnis sed consequat orci, inceptos potenti ullamcorper integer placerat mattis
                            pellentesque tempor, metus blandit ridiculus feugiat pulvinar quisque praesent. Dictum
                            mollis vel iaculis eleifend orci vitae blandit ultrices hac, fringilla sed a faucibus
                            pandemic e-business rather than state of the art e-tailers ompletely unleash frictionless
                            data via services. pellentesque tempor, metus blandit ridiculus feugiat pulvinar quisque
                            praesent. Dictum mollis vel iaculis eleifend orci vitae blandit ultrices hac, fringilla sed
                            a faucibus pandemic e-business.
                        </p>
                        <p class="bold">
                            “Tortor nunc dictumst sapien inceptos libero natoque maecenas metus viverra commodo
                            dignissim magna, donec odio leo varius nullam potenti porta facilisi vulputate sollicitudin
                            montes ostra vel himenaeos sem sociosqu erat inceptos”
                        </p>
                        <p class="disc">
                            Netus platea nec commodo tincidunt felis orci iaculis facilisi. Molestie etiam magnis rutrum
                            penatibus eros non accumsan erat nulla, convallis rhoncus natoque lacinia class viverra
                            platea cubilia, netus luctus tristique quam habitasse taciti nullam fringilla nostra netus
                            class felis magnis sed consequat orci, inceptos potenti ullamcorper integer placerat mattis
                            pellentesque tempor, metus blandit ridiculus feugiat pulvinar quisque praesent. Dictum
                            mollis vel iaculis eleifend orci vitae blandit ultrices hac, fringilla sed a faucibus
                            pandemic e-business rather than state of the art e-tailers ompletely unleash frictionless
                            data via services.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- counterup area start -->
                    <div class="counterup-area-project-details">
                        <div class="single-counter-up-area">
                            <div class="icon">
                                <i class="fa-solid fa-users fa-2x" style="color: #F84E1D;"></i>
                            </div>
                            <h2 class="counter title"><span class="odometer" data-count="1200">1200</span>+</h2>
                            <p class="disc">
                                We’ve had so many compliments
                                from friends and family
                            </p>
                        </div>
                        <div class="single-counter-up-area with-pl">
                            <div class="icon ">
                                <i class="fa-solid fa-leaf fa-2x" style="color: #F84E1D;"></i>
                            </div>
                            <h2 class="counter title"><span class="odometer" data-count="100">100</span>+</h2>
                            <p class="disc">
                                Our dedication to sustainable
                                building practices
                            </p>
                        </div>
                        <div class="single-counter-up-area with-pl">
                            <div class="icon">
                                <i class="fa-solid fa-circle-check fa-2x" style="color: #F84E1D;"></i>
                            </div>
                            <h2 class="counter title"><span class="odometer" data-count="95">95</span>+</h2>
                            <p class="disc">
                                Success rate of bot case
                                completion
                            </p>
                        </div>
                        <div class="single-counter-up-area with-pl b-n">
                            <div class="icon">
                                <i class="fa-solid fa-business-time fa-2x" style="color: #F84E1D;"></i>
                            </div>
                            <h2 class="counter title"><span class="odometer" data-count="16">16</span>+</h2>
                            <p class="disc">
                                Hours delivered back to
                                the business
                            </p>
                        </div>
                    </div>
                    <!-- counterup area end -->
                </div>

                <div class="col-lg-12 mt--50">
                    <div class="faq-inner-wrapper-one project-detils">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What Are The 5 Stages Of Building Construction?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="left">
                                            <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/@Picture1128.jpg"
                                                alt="faq">
                                        </div>
                                        <div class="right-area">
                                            <h4 class="title">We Work Strictly And Responsibly.</h4>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <a href="#" class="rts-btn btn-primary">Get A Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How Long Does It Take To Get An Estimate?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="left">
                                            <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/@Picture1128.jpg"
                                                alt="faq">
                                        </div>
                                        <div class="right-area">
                                            <h4 class="title">We Work Strictly And Responsibly.</h4>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <a href="#" class="rts-btn btn-primary">Get A Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        What Are The 5 Stages Of Building Construction?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="left">
                                            <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/@Picture1128.jpg"
                                                alt="faq">
                                        </div>
                                        <div class="right-area">
                                            <h4 class="title">We Work Strictly And Responsibly.</h4>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <a href="#" class="rts-btn btn-primary">Get A Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        How Long Does It Take To Get An Estimate?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="left">
                                            <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/@Picture1128.jpg"
                                                alt="faq">
                                        </div>
                                        <div class="right-area">
                                            <h4 class="title">We Work Strictly And Responsibly.</h4>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <a href="#" class="rts-btn btn-primary">Get A Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        What are the different types of construction projects?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="left">
                                            <img src="https://dcnglobalexhibitions.com/webcontrol/uploads/@Picture1128.jpg"
                                                alt="faq">
                                        </div>
                                        <div class="right-area">
                                            <h4 class="title">We Work Strictly And Responsibly.</h4>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <p class="disc mb--20">
                                                Proactively restore professional data and multimedia based collaboration
                                                and idea sharing. Credibly top line deliverables and cross platform
                                                manufactured products. Dramatically facilitate enabled value with
                                                seamless growth strategies.
                                            </p>
                                            <a href="#" class="rts-btn btn-primary">Get A Free Quote</a>
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
@endsection
