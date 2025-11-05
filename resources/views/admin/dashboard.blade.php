@extends('admin.layouts.app')

@section('title')
    <title>Admin Dashboard</title>
@endsection

@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between align-items-center">
                <h1>Admin Dashboard</h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>

            <!-- Dashboard Summary -->
            <div class="row">
                <!-- Total Users -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ url('admin/services') }}" class="card card-statistic-1 shadow-sm text-decoration-none">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Service</h4>
                            </div>
                            <div class="card-body">
                            {{ number_format($service) }}
                            </div> 
                        </div>
                    </a>
                </div>

                <!-- Today's New Users -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ url('admin/global-presence') }}"
                        class="card card-statistic-1 shadow-sm text-decoration-none">
                        <div class="card-icon bg-info">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Global Presence</h4>
                            </div>
                            <div class="card-body">
                                {{ $global_presence }}
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Total Dictionary Entries -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ url('admin/exhibitions') }}"
                        class="card card-statistic-1 shadow-sm text-decoration-none">
                        <div class="card-icon bg-success">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Trade Show Calender</h4>
                            </div>
                            <div class="card-body">
                                {{ number_format($exhibitions) }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Latest Users Table -->
           
            <!-- User Registration Chart -->
          

        </section>


    </div>
@endsection
