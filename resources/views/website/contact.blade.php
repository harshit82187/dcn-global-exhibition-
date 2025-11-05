@extends('website.layouts.app')

@section('title', 'Contact Us Page')

@section('content')

@php
$banner = getBanner('contact_us');
$url=asset('/uploads/page_banners/unnamed (9).jpg');
@endphp

<!-- <div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative contact-bd"> -->
<div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"
    style="background-image: url('{{ $url }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-inner">
                    <span class="water-text">Contact</span>
                    <!-- <h1 class="title">
                            Contact Us
                        </h1> -->
                    <div class="nav-area-navigation">
                        <a href="{{ url('/') }}">Home</a>
                        <a class="current" href="#">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rts-contact-area-page rts-section-gap">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 pr--60 pr_sm--0 mb_sm--30 pr_md--10 pb_md--25 pb_sm--25">
                <div class="contact-main-wrapper-left">
                    <span>Get In Touch</span>
                    <h3 class="title-main">
                        We are always ready to help you <br> and answer your questions
                    </h3>
                   
                    <div class="row g-24">
                        <div class="col-lg-6 d-flex ">
                            <div class="quick-contact-page-1 flex-fill">

                                @php
                                $addresses = is_string($contacts->addresses) ? json_decode($contacts->addresses, true) : $contacts->addresses;


                                @endphp
                                <h5 class="title">India</h5>
                                <p class="mb-0">
                                    <!-- @foreach($webConfigMobileNos as $webConfigMobileNo)
                                        <a href="tel:{{ $webConfigMobileNo }}">{{ $webConfigMobileNo }}</a> <br>
                                    @endforeach -->
                                    <a href="tel:{{ $webConfigMobileNos[1] }}">Mob: {{ $webConfigMobileNos[1] }}</a>
                                </p>
                                <p class="mb-0" >
                                    <a href="mailto:{{ $webConfigEmail }}">Mail: {{ $webConfigEmail }}</a>
                                </p>
                                <p class="mb-0">
                                    <a href="#">{{ $webConfigAddresses[1] }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="quick-contact-page-1 flex-fill">
                                <h5 class="title">Poland</h5>
                                <p class="mb-0">
                                    <a href="tel:{{ $webConfigMobileNos[0] }}">Mob: {{ $webConfigMobileNos[0] }}</a>
                                </p>
                                <p class="mb-0">
                                    <a href="mailto:{{ $webConfigEmail }}">Mail: {{ $webConfigEmail }}</a>
                                </p>
                                <p class="mb-0">
                                    <a href="#">{{ $webConfigAddresses[0] }}</a>
                                </p>
                            </div>
                        </div>

                          <div class="col-lg-6 d-flex">
                            <div class="quick-contact-page-1 flex-fill">
                                <h5 class="title">Deutschland</h5>
                                <!-- <p class="mb-0">
                                    <a href="tel:{{ $webConfigMobileNos[0] }}">Mob: {{ $webConfigMobileNos[0] }}</a>
                                </p>
                                <p class="mb-0">
                                    <a href="mailto:{{ $webConfigEmail }}">Mail: {{ $webConfigEmail }}</a>
                                </p> -->
                                <p class="mb-0">
                                    <a href="#">Auf Der Struth-1 61279<br> Grävenwiesbach Deutschland</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Contact Form Section --}}
            <div class="col-lg-6">
                <div id="form-messages"></div>

                <form action="{{ route('contactUs-store') }}" method="POST" class="contact-form-area-wrapper position-relative">
                    @csrf

                    {{-- Success or Error Messages --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert" style="top: -60px; z-index: 10;">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right;"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show position-absolute w-100" role="alert" style="top: -60px; z-index: 10;">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right;"></button>
                    </div>
                    @endif

                    <h4 class="title">Let’s Get in Touch</h4>

                    <div class="half-inpur-wrapper">
                        <div class="single">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="single">
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="single">
                        <input type="text" name="phone" placeholder="Phone (optional)">
                    </div>

                    <div class="single">
                        <input type="text" name="subject" placeholder="Subject (optional)">
                    </div>

                    <div class="single">
                        <textarea name="message" placeholder="Type Your Message" required></textarea>
                    </div>

                    <button type="submit" class="rts-btn btn-primary">Send Message</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

<script>
    // Auto-hide alert after 4 seconds
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('hide');
        }
    }, 4000); // 4 seconds
</script>