@php
use Illuminate\Support\Str;
use App\Models\Services;
$services = Services::all();
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="https://dcnglobalexhibitions.com/public/front/logo/logo-dcn.png">
		<link rel="stylesheet" href="{{ asset('front/css/fontawesome.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/aos.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/odometer.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/metismenu.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/magnifying-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
		<title>@yield('title', 'DCN Global Exhibition')</title>
	</head>
	<body>
		@include('website.layouts.header')
		<div id="side-bar" class="side-bar header-two">
			<button class="close-icon-menu"><i class="far fa-times"></i></button>
			<!-- inner menu area desktop start -->
			<div class="inner-main-wrapper-desk">
				<div class="thumbnail">
					<img src="images/04.jpg" alt="elevate">
				</div>
				<div class="inner-content">
					<h4 class="title">We Build Building and Great Constructive Homes.</h4>
					<p class="disc">
						We successfully cope with tasks of varying complexity, provide long-term guarantees and regularly
						master new technologies.
					</p>
					<div class="footer">
						<h4 class="title">Got a project in mind?</h4>
						<a href="contact.html" class="rts-btn btn-primary">Let's talk</a>
					</div>
				</div>
			</div>
			<!-- mobile menu area start -->
			<div class="mobile-menu d-block d-xl-none">
				<nav class="nav-main mainmenu-nav mt--30">
					<ul class="mainmenu metismenu" id="mobile-menu-active">
						<li class="main-nav">
							<a href="{{ route('home') }}" class="main">Home</a>
						</li>
						<li class="main-nav">
							<a href="{{ route('about-us') }}" class="main">About Us</a>
						</li>
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
						<li class="main-nav">
							<a href="Portfolio" class="main">Portfolio</a>
						</li>
						<li class="main-nav has-droupdown project-a-after">
							<a href="#" class="main">Global Presence</a>
							<ul class="submenu mm-collapse parent-nav">
								<li><a href="{{ route('services') }}">Designing and Fabrication</a></li>
								<li><a href="Exhibition.htmll">Exhibition and Events</a></li>
								<li><a href="Interior.html">Interior</a></li>
							</ul>
						</li>
						<li class="main-nav has-droupdown project-a-after">
							<a href="#" class="main">Tradeshow Calendar</a>
							<ul class="submenu mm-collapse parent-nav">
								<li><a href="Designing.html">Designing and Fabrication</a></li>
								<li><a href="Exhibition.htmll">Exhibition and Events</a></li>
								<li><a href="Interior.html">Interior</a></li>
							</ul>
						</li>
						<li class="main-nav">
							<a href="{{ route('contact') }}" class="main">Contact</a>
						</li>
					</ul>
				</nav>
				<div class="social-wrapper-one">
					<ul>
						<li>
							<a href="#">
							<i class="fa-brands fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="fa-brands fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="fa-brands fa-youtube"></i>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="fa-brands fa-linkedin-in"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- mobile menu area end -->
		</div>
		<!-- header area end -->
		{{-- Page Content --}}
		<main>
			@yield('content')
		</main>
		{{-- Footer --}}
		@include('website.layouts.footer')
		{{-- JS Scripts --}}
		<script src="{{ asset('front/js/jquery.js') }}"></script>
		<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('front/js/odometer.js') }}"></script>
		<script src="{{ asset('front/js/jquery-appear.js') }}"></script>
		<script src="{{ asset('front/js/metismenu.js') }}"></script>
		<script src="{{ asset('front/js/swiper.js') }}"></script>
		<script src="{{ asset('front/js/aos.js') }}"></script>
		<script src="{{ asset('front/js/nice-select.js') }}"></script>
		<script src="{{ asset('front/js/smooth-scroll.js') }}"></script>
		<script src="{{ asset('front/js/waw.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuSiPhoDaOJ7aqtJVtQhYhLzwwJ7rQlmA"></script>
		<script src="{{ asset('front/js/marker.js') }}"></script>
		<script src="{{ asset('front/js/map-content.js') }}"></script>
		<script src="{{ asset('front/js/info-box.js') }}"></script>
		<script src="{{ asset('front/js/magnific-popup.js') }}"></script>
		<script src="{{ asset('front/js/contact.form.js') }}"></script>
		<script src="{{ asset('front/js/main.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
		<script>
			let lastScrollY = window.scrollY;
			let marquee = document.querySelector('.marquee');
			let position = 0; 
			let scrollTimeout;
			function updateMarqueeOnScroll() {
			    const currentScrollY = window.scrollY;
			    if (currentScrollY > lastScrollY) {
			        position -= 4; 
			    } else if (currentScrollY < lastScrollY) {
			        position += 4;
			    }
			    marquee.style.transform = `translateX(${position}px)`;
			    lastScrollY = currentScrollY;
			    clearTimeout(scrollTimeout);
			    scrollTimeout = setTimeout(() => marquee.style.transform = `translateX(${position}px)`, 50);
			}
			window.addEventListener('scroll', updateMarqueeOnScroll);
		</script>
		<script>
			const swiper = new Swiper(".mySwiper", {
			    loop: true,
			    slidesPerView: 1,
			    spaceBetween: 10,
			    pagination: {
			        el: ".swiper-pagination",
			        clickable: true,
			    },
			    navigation: {
			        nextEl: ".swiper-button-next",
			        prevEl: ".swiper-button-prev",
			    },
			    autoplay: {
			        delay: 3000,
			        disableOnInteraction: false,
			    },
			});
		</script>
		@if (Session::has('success') || Session::has('error') || $errors->any())
		<script>
			@if (Session::has('success'))
				var messageType = 'info';
				var messageColor = 'blue';
				var message = "{{ Session::get('success') }}";
			@elseif (Session::has('error'))
				var messageType = 'warning';
				var messageColor = 'orange';
				var message = "{{ Session::get('error') }}";
			@elseif ($errors->any())
				var messageType = 'error';
				var messageColor = 'red';
				var message = @json($errors->all());
			@endif

			if (Array.isArray(message)) {
				message.forEach(function (msg) {
					iziToast[messageType]({
						message: msg,
						position: 'topRight',
						timeout: 4000,
						displayMode: 0,
						color: messageColor,
						theme: 'light',
						messageColor: 'black',
					});
				});
			} else {
				iziToast[messageType]({
					message: message,
					position: 'topRight',
					timeout: 4000,
					displayMode: 0,
					color: messageColor,
					theme: 'light',
					messageColor: 'black',
				});
			}
		</script>
		@endif
		@stack('js')
	</body>
</html>