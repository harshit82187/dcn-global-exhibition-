@extends('website.layouts.app')
@section('title', 'DCN Global Exhibition')
@section('content')
<div class="banner-swiper-area-one mb-5">
	<div class="swiper mySwiper-banner-one" dir="ltr">
		<div class="swiper-wrapper">
			@foreach ($sliders as $index => $banner)
			<div class="swiper-slide">
				<!-- banner area one start -->
				<div class="banner-area-one-start rts-section-gap {{ $index == 1 ? 'two' : ($index == 2 ? 'three' : '') }} bg_banner-one"
					style="background-image: url('{{ asset($banner->image) }}'); background-size: cover; background-position: center;">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<!-- banner inner content area -->
								<div class="banner-inner-content-one">
									<span class="pre">{{ $banner->title }}</span>
									<h1 class="title">{{ $banner->subtitle }}</h1>
									<p class="disc">{{ $banner->description }}</p>
									<div class="button-wrapper">
										<a href="#" class="rts-btn btn-white">Our Services <img
											src="{{ asset('front/images/arrow-up-right-1.svg') }}" alt="arrow"></a>
									</div>
								</div>
								<!-- banner inner content area end -->
							</div>
						</div>
					</div>
				</div>
				<!-- banner area one end -->
			</div>
			@endforeach
		</div>
		<div class="swiper-paginations"></div>
	</div>
</div>
<!-- banner swiper wrapper area end -->
<div class="about-company-service-area rts-about-company-area rts-section-gap bg_image bg-dark">
	@foreach ($aboutbanners as $banner)
	<div class="about-section-area rts-section-gapBottom">
		<div class="container">
			<div class="row align-items-center">
				<!-- Left Column: Images -->
				<div class="col-lg-5">
					<div class="about-thumbnail-inner-one">
						<div class="reveal-item overflow-hidden aos-init">
							<div class="reveal-animation reveal-end reveal-primary aos aos-init"></div>
							<!-- Swiper Container -->
							<div class="swiper mySwiper">
								<div class="swiper-wrapper">
									@php
									$images = json_decode($banner->image, true);
									@endphp
									@if (!empty($images))
									@foreach ($images as $img)
									<div class="swiper-slide">
										<img src="{{ asset($img) }}" alt="journey-area" />
									</div>
									@endforeach
									@endif
								</div>
								<div class="swiper-pagination text-white"></div>
							</div>
						</div>
						<!-- Optional Counter Section -->
						<div class="content-wrapper">
							<div class="single">
								<h2 class="counter title"><span class="odometer" data-count="500">00</span>+</h2>
								<span class="pp">Projects Delivered</span>
							</div>
							<div class="single primary">
								<h2 class="counter title"><span class="odometer" data-count="48">00</span>+</h2>
								<span class="pp">Global Recognitions</span>
							</div>
						</div>
					</div>
				</div>
				<!-- Right Column: Content -->
				<div class="col-lg-7 pl--80 pl_md--15 pl_sm--10 pt_md--25 mt_sm--25">
					<div class="about-inner-area-content-one">
						<span class="pre">{{ $banner->title }}</span>
						<h2 class="title">{{ $banner->heading }}</h2>
						<p class="disc">{!! nl2br(e($banner->description)) !!}</p>
						<a href="{{ url('about-us') }}" class="rts-btn btn-primary border">
						Explore More
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@php
		$firstService = $services->first();
	@endphp
	<section class="insta-services py-5">
		<div class="container">
			<div class="row">
				<!-- Left Column -->
				<div class="col-lg-6">
					<p class="text-uppercase mb-2 label-text">Our Services</p>
					<h2 class="service-title">We provide the best design<br>solutions.</h2>
					<p class="service-desc">We are Crafting excellence through precision fabrication solutions tailored to your needs.</p>

					<nav class="nav flex-column service-list mb-4">
						@foreach ($services as $index => $service)
							<a class="nav-link {{ $loop->first ? 'active' : '' }}" href="{{ route('service',$service->slug) }}"
							data-id="service-{{ $index }}"
							data-title="{{ $service->name }}"
							data-img="{{ asset($service->home_page_img) }}">
								{{ $service->name }}
							</a>
							<div id="desc-service-{{ $index }}" style="display: none;">
								{!! $service->description !!}
							</div>
						@endforeach
					</nav>
				</div>

				<!-- Right Column -->
				<div class="col-lg-6">
					<div class="image-box">
						<img id="service-image" src="{{ asset($firstService->image) }}" alt="Service Image">
						<div class="overlay-box">
							<h5 id="overlay-title">{{ $firstService->name }}</h5>
							<div class="text-white" id="overlay-desc">{!! $firstService->description !!}</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>
<!-- portfolio team area start -->
<div class="portfolio-team-area-bg rts-section-gap bg_image bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-center-style-one">
					<span class="pre">Recent Projects</span>
					<h2 class="title">Our Completed Projects</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt--40">

		<div class="col-lg-12">
			<div class="swiper-wrapper-project">
				<div class="swiper mySwiper-project-1" dir="ltr">
					<div class="swiper-wrapper">
						@foreach ($projects as $project)
						<div class="swiper-slide">
							<!-- single project area start -->
							<div class="project-area-start-1">
								<a href="" class="thumbnail">
								<img src="{{ asset('uploads/projects/' . $project->image) }}"
									alt="">
								</a>
								<div class="inner-content-project">					
									<div class="thumb-wrapper">									
										<div class="single">
											<span>Project Year:</span>
											<p>{{ $project->project_year }}</p>
										</div>
										<div class="single">
											<span>Location:</span>
											<p>{{ $project->location }}</p>
										</div>
									</div>
								</div>
							</div>
							<!-- single project area end -->
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- portfolio team area ends -->
<!-- rts blog area start -->
<div class="rts-blog-area rts-section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-center-style-one dark-title">
					<span class="pre">Latest News</span>
					<h2 class="title">Articles & Blog Posts</h2>
				</div>
			</div>
		</div>
		<div class="row g-24 mt--30 mt_sm--10">
			@foreach ($blogs as $blog)
			<div class="col-lg-4 col-md-6 col-sm-12 col-12">
				<!-- single blog area start -->
				<div class="rts-blog-card-one">
					<a href="" class="thumbnail">
						<img src="{{ asset('blogs/' . $blog->image) }}" alt="blog_card">
						<div class="tag-area">
							<span class="time">{{ $blog->created_at->diffForHumans() }}</span>
							<span class="location">Blog</span>
						</div>
					</a>
					<div class="inner-wrapper">
						<a href="">
							<h5 class="title">{{ $blog->title }}</h5>
						</a>
						<p class="disc">
							{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 100) }}
						</p>
						<a href="" class="read-more-btn">
						Read More <i class="fa-sharp fa-regular fa-arrow-right"></i>
						</a>
					</div>
				</div>
				<!-- single blog area end -->
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- rts blog area end -->
<!-- rts brand area start -->

<div class="rts-brand-area rts-section-gapBottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="swiper mySwiper-brand-1" dir="ltr">
					<div class="swiper-wrapper">
						@foreach ($brand as $item)
						<div class="swiper-slide">
							<div class="sigle-brand">
								<img src="{{ asset('uploads/brand/' . $item->image) }}" alt="brand">
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection