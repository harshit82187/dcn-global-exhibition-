<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ route('admin.dashboard') }}">
			<img src="{{ asset('front//logo/logo-dcn.png') }}" alt="DCN" width="150px">
			</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="{{ route('admin.dashboard') }}"></a>
		</div>
		<ul class="sidebar-menu">
			<li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}"><a class="nav-link"
				href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
				<span>@lang('Dashboard')</span></a>
			</li>
			
			<li class="nav-item dropdown {{ Route::is('admin.alphabet.list') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown">
				<i class="fas fa-cogs"></i>
				<span>@lang('Services')</span>
				</a>
				<ul class="dropdown-menu">
					<li class="">
						<a class="nav-link" href="{{ route('services') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('Services')</span>
						</a>
					</li>
					
				</ul>
			</li>
			<li class="nav-item {{ Route::is('admin.global-presence') ? 'active' : '' }}">
				<a href="{{ route('admin.global-presence') }}" class="nav-link">
				<i class="fas fa-globe"></i>
				<span>@lang('Global Presence')</span>
				</a>
			</li>
			<li class="nav-item {{ Request::is('admin/exhibitions') ? 'active' : '' }}">
				<a href="{{ url('admin/exhibitions') }}" class="nav-link">
				<i class="fas fa-globe"></i>
				<span>@lang('Tradeshow Calender')</span>
				</a>
			</li>
            <li class="nav-item dropdown {{ Route::is('admin.category.list') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown">
				<i class="fas fa-file-alt"></i>
				<span>Website Pages</span>
				</a>
				<ul class="dropdown-menu">
					<li class="">
						<a class="nav-link" href="{{ route('banners.index') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('Home Slider')</span>
						</a>
					</li>
					<li class="">
						<a class="nav-link" href="{{ route('abouts.banner') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('Aboutsbanner')</span>
						</a>
					</li>
					<li class="">
						<a class="nav-link" href="{{ route('blogs') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('Blogs')</span>
						</a>
					</li>
					<li class="">
						<a class="nav-link" href="{{ route('brand') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('Brand')</span>
						</a>
					</li>
					<li class="">
						<a class="nav-link" href="{{ route('project') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('Completed Projects')</span>
						</a>
					</li>
					
				</ul>
			</li>
			<li class="nav-item {{ Route::is('admin.alphabet.list') ? 'active' : '' }}">
				<a href="{{ route('contact-list') }}" class="nav-link">
				<i class="fas fa-envelope"></i>
				<span>Get In Touch</span>
				</a>
			</li>
			<li class="nav-item {{ Route::is('contact_details.index') ? 'active' : '' }}">
				<a href="{{ route('contact_details.index') }}" class="nav-link">
				<i class="fas fa-globe"></i>
				<span>@lang('Social Media')</span>
				</a>
			</li>
			<li class="nav-item {{ Route::is('contact_details.index') ? 'active' : '' }}">
				<a href="{{ route('page_banner.index') }}" class="nav-link">
				<i class="fas fa-clipboard"></i>
				<span>@lang('Page Banner Management')</span>
				</a>
			</li>
			<li class="nav-item dropdown {{ Route::is('admin.alphabet.list') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown">
				<i class="fas fa-info-circle"></i>
				<span>@lang('About Us')</span>
				</a>
				<ul class="dropdown-menu">
					<li class="">
						<a class="nav-link" href="{{ route('aboutus') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('About Us')</span>
						</a>
					</li>
					
				</ul>
			</li>
			<li class="nav-item dropdown {{ Route::is('admin.alphabet.list') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown">
				<i class="fas fa-font"></i>
				<span>@lang('Portfolio')</span>
				</a>
				<ul class="dropdown-menu">
					<li class="">
						<a class="nav-link" href="{{ route('admin.portfolio') }}">
						<i class="fas fa-layer-group"></i>
						<span>@lang('Portfolio')</span>
						</a>
					</li>
				</ul>
			</li>
		
		</ul>
	</aside>
</div>