<footer>
	<div class="rts-footer-area rts-section-gapTop bg_footer-1 bg_image">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="footer-wrapper-left-one">
						<a href="{{ url('/') }}" class="logo">
							<img src="{{ asset('front/logo/logo-dcn.png') }}" alt="logo">
						</a>
							<div class="disc">
							<h4 class="title mb-0">Address : </h4>
							<p><strong class="text-white">Leśna 8, 62-023 Robakowo, Poland</strong></p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="footer-wrapper-right">
						<div class="single-nav-area-footer use-link">
							<h4 class="title">Useful Links</h4>
							<ul>
								<li><a href="{{ route('about-us') }}"><i class="fa-solid fa-info-circle"></i> About Us</a></li>
								<!-- <li><a href=""><i class="fa-solid fa-file-contract"></i> Terms & Condition</a></li>
								<li><a href=""><i class="fa-solid fa-shield-alt"></i> Privacy Policy</a></li>
								<li><a href=""><i class="fa-solid fa-leaf"></i> Environment Policy</a></li> -->
								<li><a href="{{ route('contact') }}"><i class="fa-solid fa-envelope"></i> Contact Us</a></li>
							</ul>
						</div>
						<div class="single-nav-area-footer use-link">
							<h4 class="title">Services</h4>
							@php $services = \App\Models\Services::all(); @endphp
							<ul>
								@isset($services)
									@foreach($services as $service)
								        <li><a href="{{ route('service',$service->slug) }}" target="_blank"><i class="fa-regular fa-arrow-right-long"></i> {{ $service->name }}</a></li>
									@endforeach
								@endif
							</ul>
						</div>
						<div class="single-nav-area-footer news-letter">
							<h4 class="title">Newsletter</h4>
							<p>Aplications prodize before front end ortals visualize front end</p>
							<div class="social-area-wrapper-one">
								<ul class="flex flex-row d-flex">
									<li><a href="javascript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a href="https://www.linkedin.com/company/102462139/admin/dashboard/"><i class="fa-brands fa-linkedin-in"></i></a></li>
								</ul>
							</div>

							<form action="#">
								<input type="email" placeholder="Email Address" required="">
								<button class="btn-subscribe mt--15">Subscribe Now</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-full copyright-area-one">
			<div class="row">
				<div class="col-lg-12">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="copyright-wrapper py-3">
									<p class="mb-0">{{ date('Y') }} © All Rights Reserved <i class="fa fa-heart heart text-danger"></i> By <a href="{{ url('/') }}" target="_blank" style="color:#f84e1d !important;">DCN Global Exhibition</a> And Powered By <a href="{{ url('https://www.pearlorganisation.com/') }}" target="_blank" style="color:#f84e1d !important;">Pearl Organisation</a>
									</p>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- progress area end -->
	<!-- progress area start -->
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
				style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
			</path>
		</svg>
	</div>
	<!-- progress area end -->
	<!-- watsapp -->
	<div class="floating_btn">
		<a target="_blank" href="https://wa.me/">
			<div class="contact_icon">
				<i class="fa-brands fa-whatsapp my-float"></i>
			</div>
		</a>
	</div>
	<!--  -->
	<!-- offcanvase search -->
	<div class="search-input-area">
		<div class="container">
			<div class="search-input-inner">
				<div class="input-div">
					<input class="search-input autocomplete" type="text" placeholder="Search by keyword or #">
					<button><i class="far fa-search"></i></button>
				</div>
			</div>
		</div>
		<div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
	</div>
	<div id="anywhere-home" class="">
	</div>
</footer>