<header class="heder-one">
	<div class="header-two-container">
		<div class="row">
			<div class="col-12">
				<div class="header-main-wrapper">
					<div class="logo-area">
						<a href="{{ url('/') }}" class="logo">
							<img src="{{ asset('front/logo/logo-dcn.png') }}" alt="image-logo">
						</a>
					</div>
					<div class="rts-header-right position-static">
						<!-- top header -->
						<div class="top">
							<div class="end-top">
								<div class="single-info">
									<div class="icon">
										<i class="fa-light fa-mobile"></i>
									</div>
									@foreach($webConfigMobileNos as $webConfigMobileNo)
									<a href="tel:$webConfigMobileNo">{{ $webConfigMobileNo }}</a>
									@endforeach
								</div>
								<div class="single-info">
									<div class="icon"><i class="fa-regular fa-envelope"></i></div>
									<a href="mailto:{{ $webConfigEmail }}">{{ $webConfigEmail }}</a>
								</div>
							</div>
							<div class="start-top">
								<div class="social-header">
									<span>Follow Us On digital platform:</span>
									<ul>
										<li><a href="javascript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
										<li><a href="https://www.linkedin.com/company/102462139/admin/dashboard/"><i class="fa-brands fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="bottom">
							<div class="nav-area">
								<ul class="">
									<li class="main-nav"><a href="{{ route('home') }}">Home</a></li>
									<li class="main-nav"><a href="{{ route('about-us') }}">About Us</a></li>
									<li class="main-nav has-dropdown project-a-after">
										<a href="#">Services</a>
										<ul class="submenu parent-nav">
											@foreach ($services as $service)
											<li>
												<a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a>
											</li>
											@endforeach
										</ul>
									</li>
									<li class="main-nav"><a href="{{ route('portfolio') }}">Portfolio</a></li>
									<li class="main-nav has-dropdown project-a-after">
										<a href="#">Global Presence</a>
										<ul class="submenu parent-nav">
											@php $globals = \App\Models\GlobalPresence::where('status',1)->get(); @endphp
											@isset($globals)
												@foreach($globals as $global)
													<li><a href="{{ route('global-presence',$global->slug) }}">{{ $global->name ?? '' }}</a></li>
												@endforeach
											@endisset
										</ul>
									</li>
									<li class="main-nav has-dropdown project-a-after">
										<a href="#">Tradeshow Calender</a>
										<ul class="submenu parent-nav">
											@php $exhibitions = \App\Models\Exhibition::where('status',1)->get(); @endphp
											@isset($exhibitions)
												@foreach($exhibitions as $exhibition)
													<li><a href="{{ url('exhibition',$exhibition->slug) }}">{{ $exhibition->title ?? '' }}</a></li>
												@endforeach
											@endisset
										</ul>
									</li>
									<li class="main-nav"><a href="{{ route('contact') }}">Contact</a></li>
								</ul>
							</div>
							<!-- nav-area end -->
							<!-- header style two End -->
							<div class="right-area">
								<a href="{{ route('get-a-quote') }}" class="rts-btn btn-header btn-transparent">Get a Quote
									<img src="{{ asset('front/images/arrow-up-right.svg') }}" alt="arrow">
								</a>
								<div class="nav-btn menu-btn">
									<img src="{{ asset('front/images/bar.svg') }}" alt="nav-iamge">
								</div>
							</div>
						</div>
						<!-- bottom header end -->
					</div>
					<!-- header right end -->
				</div>
			</div>
		</div>
	</div>
</header>
<header class="heder-one header--sticky">
	<div class="header-two-container">
		<div class="row">
			<div class="col-12">
				<div class="header-main-wrapper">
					<div class="logo-area">
						<a href="{{ url('/') }}" class="logo">
							<img src="{{ asset('front/logo/logo-dcn.png') }}" alt="image-logo">
						</a>
					</div>
					<!-- header right start -->
					<div class="rts-header-right  position-static">
						<!-- top header -->
						<div class="top">
							<div class="end-top">
								<div class="single-info">
									<div class="icon">
										<i class="fa-light fa-mobile"></i>
									</div>
									@foreach($webConfigMobileNos as $webConfigMobileNo)
									<a href="tel:$webConfigMobileNo">{{ $webConfigMobileNo }}</a>
									@endforeach
								</div>
								<div class="single-info">
									<div class="icon"><i class="fa-regular fa-envelope"></i></div>
									<a href="mailto:{{ $webConfigEmail }}">{{ $webConfigEmail }}</a>
								</div>
							</div>
							<div class="start-top">
								<div class="social-header">
									<span>Follow Us On:</span>
									<ul>
										<li><a href="javascript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
										<li><a href="https://www.linkedin.com/company/102462139/admin/dashboard/"><i class="fa-brands fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- top header end -->
						<!-- bottom header start -->
						<div class="bottom">
							<!-- header style two -->
							<!-- nav area start -->
							<div class="nav-area">
								<ul class="">
									<li class="main-nav"><a href="{{ route('home') }}">Home</a></li>
									<li class="main-nav"><a href="{{ route('about-us') }}">About Us</a></li>
									<li class="main-nav has-dropdown project-a-after">
										<a href="#">Services</a>
										<ul class="submenu parent-nav">
											@foreach ($services as $service)
											<li>
												<a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a>
											</li>
											@endforeach
										</ul>
									</li>
									<li class="main-nav"><a href="{{ route('portfolio') }}">Portfolio</a>
									</li>
									<li class="main-nav has-dropdown project-a-after">
										<a href="#">Global Presence</a>
										<ul class="submenu parent-nav">
											@php $globals = \App\Models\GlobalPresence::where('status',1)->get(); @endphp
											@isset($globals)
												@foreach($globals as $global)
													<li><a href="{{ route('global-presence',$global->slug) }}">{{ $global->name ?? '' }}</a></li>
												@endforeach
											@endisset
										</ul>
									</li>
									<li class="main-nav has-dropdown project-a-after">
										<a href="#">Tradeshow Calender</a>
										<ul class="submenu parent-nav">
											@php $exhibitions = \App\Models\Exhibition::where('status',1)->get(); @endphp
											@isset($exhibitions)
												@foreach($exhibitions as $exhibition)
													<li><a href="{{ url('exhibition',$exhibition->slug) }}">{{ $exhibition->title ?? '' }}</a></li>
												@endforeach
											@endisset
										</ul>
									</li>
									<li class="main-nav"><a href="{{ route('contact') }}">Contact</a></li>
								</ul>
							</div>
							<!-- nav-area end -->
							<!-- header style two End -->
							<div class="right-area">

								<a href="{{ route('get-a-quote') }}" class="rts-btn btn-header btn-transparent">Get a Quote
									<img src="{{ asset('front/images/arrow-up-right.svg') }}" alt="arrow">
								</a>
								<div class="nav-btn menu-btn" id="menu-btn">
									<img src="{{ asset('front/images/bar.svg') }}" alt="nav-iamge">
								</div>
							</div>
						</div>
						<!-- bottom header end -->
					</div>
					<!-- header right end -->
				</div>
			</div>
		</div>
	</div>
</header>
