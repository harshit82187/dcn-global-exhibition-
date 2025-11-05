@extends('website.layouts.app')
@section('title', 'Portfolio Page')
@section('content')
@php
$url = asset('uploads/page_banners/PORTFOLIO%20.jpg');
@endphp

<div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative"
    style="background-image: url('{{ $url }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-inner">
                    <span class="water-text">Portfolio</span>
                    <div class="nav-area-navigation">
                        <a href="{{ route('home') }}">home</a>
                        <a class="current" href="{{ route('portfolio') }}">Portfolio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rts-projects-area-inner rts-section-gap">
    <div class="container">
        <div class="row mt--15 g-24">
            @isset($portfolios)
            @foreach($portfolios as $portfolio)
            <div class="col-lg-4">
                <div class="rts-single-offer single-project-card-inner">
                    <a data-fancybox="all-portfolio-gallery" 
                       href="{{ asset($portfolio->image) }}" 
                       class="thumbnail"
                       data-caption="{{ $portfolio->name }} - Main Image ({{ $portfolio->year }})">
                        <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->name }}">
                    </a>
                    
                    @php $decodedImages = json_decode($portfolio->files, true); @endphp
                    @if($decodedImages && is_array($decodedImages))
                        @foreach($decodedImages as $index => $decodedImage)
                        <a data-fancybox="all-portfolio-gallery" 
                           href="{{ $decodedImage }}" 
                           data-caption="{{ $portfolio->name }} - Image {{ $index + 2 }} ({{ $portfolio->year }})"
                           style="display: none;">
                            <img src="{{ $decodedImage }}" alt="{{ $portfolio->name }} - Image {{ $index + 2 }}" style="display: none;">
                        </a>
                        @endforeach
                    @endif
                    
                    @if($portfolio->video)
                    <a data-fancybox="all-portfolio-gallery"
                       href="{{ asset($portfolio->video) }}"
                       data-caption="{{ $portfolio->name }} - Video ({{ $portfolio->year }})"
                       data-type="video"
                       style="display: none;">
                    </a>
                    @endif
                    
                    <a href="javascript:void(0)">
                        <div class="inner">
                            <h5 class="title">{{ $portfolio->name }}</h5>
                            <span>{{ $portfolio->year }}</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
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
                        <a href="{{ url('contact') }}" class="rts-btn btn-primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Fancybox.bind("[data-fancybox='all-portfolio-gallery']", {
        Thumbs: {
            autoStart: true,
            axis: "x"
        },
        Toolbar: {
            display: {
                left: ["infobar"],
                middle: [
                    "zoomIn",
                    "zoomOut",
                    "toggle1to1",
                    "rotateCCW",
                    "rotateCW",
                    "flipX",
                    "flipY",
                ],
                right: ["slideshow", "thumbs", "close"],
            },
        },
        animated: true,
        showClass: "fancybox-zoomInUp",
        hideClass: "fancybox-zoomOutDown",
        counter: true,
    });
});
</script>

@endsection