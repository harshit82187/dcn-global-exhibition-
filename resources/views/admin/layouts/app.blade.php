@include('admin.layouts.header')
<?php

$admin = \App\Models\Admin::first();
?>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown dropdown-list-toggle">
                        <a href="{{ route('website-setting.cache-clear') }}" class="btn btn-sm" style="display: inline-block; background-color: #ffe9ec; color: #f3425f; padding: 10px 15px; border-radius: 6px; margin-top: 10px; text-decoration: none;font-size: 12px;">
                            <i class="fas fa-database" style="margin-right: 5px;"></i> Clear Cache
                        </a>

                    </li>
                    
                    <li class="dropdown dropdown-list-toggle">
                         <a href="{{ url('/') }}" target="_blank" class="btn btn-sm" style="display: inline-block; background-color: #ff0000; color: #e0f7ff; padding: 10px 15px; border-radius: 6px; margin-top: 10px; text-decoration: none;font-size: 12px;">
                            <i class="fas fa-home" style="margin-right: 5px;"></i> Visit Website
                        </a>


                    </li>


                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if ($admin->profile ?? '')
                                <img alt="{{ asset('uploads/admin/profile/' . $admin->profile) }}" src="{{ asset('uploads/admin/profile/' . $admin->profile) }}"
                                    class="rounded-circle mr-1">
                            @endif
                            <div class="d-sm-none d-lg-inline-block">{{ $admin->name ?? '' }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>


                            <div class="dropdown-divider"></div>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item has-icon text-danger"
                                    onclick="return confirm('Are you sure you want to logout?')">
                                    <i class="fas fa-sign-out-alt mt-2"></i> @lang('logout')
                                </button>
                            </form>



                        </div>
                    </li>
                </ul>
            </nav>




            @include('admin.layouts.sidebar')

            @yield('admin-content')



            <footer class="main-footer">
                <div class="footer-left">
                    {{ $footer->copyright ?? '' }}
                </div>
                <div class="footer-right">
                    {{ __('App Version') }} : {{ $setting->app_version ?? '' }}
                </div>
            </footer>
        </div>
    </div>

    @include('admin.layouts.footer')
