@extends('website.layouts.app')
@section('title', 'Exhibition | DCN Global')
@section('content')
<div class="rts-banner-area rts-section-gap rts-breadcrumb-area position-relative" style="background-image: url('{{ asset($exhibition->image) }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-inner">
                    <!-- <h1 class="title"> {{ $exhibition->title ?? 'N/A' }}   </h1> -->
                    <div class="nav-area-navigation">
                        <a href="{{ url('/') }}" style="cursor:pointer;">Home</a>
                        <a class="current" href="{{ url($exhibition->slug ?? 'N/A')  }} ">{{ $exhibition->title ?? 'N/A' }} </a>
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
            @isset($infos)
                @if(is_array($infos['ex_image']))
                    @foreach ($infos['ex_image'] as $index => $img)
                        <div class="col-lg-4">
                            <div class="rts-single-offer">
                                <a data-fancybox="gallery" href="{{ asset($img) }}" class="thumbnail">
                                    <img src="{{ asset($img) }}" alt="{{ $infos['name'][$index] ?? '' }}">
                                </a>
                                <div class="content-wrapper">
                                    <a href="javascript:void(0)">
                                        <h5 class="title">{{ $infos['name'][$index] ?? '' }}</h5>
                                    </a>
                                    <p class="disc">- {{ $infos['area'][$index] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endisset

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
                        <a href="{{  url('contact') }}" class="rts-btn btn-primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection