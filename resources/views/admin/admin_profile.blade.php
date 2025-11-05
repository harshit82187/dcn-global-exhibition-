<!-- View: admin.admin_profile.blade.php -->
@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content" style="min-height: 641px;">
        <section class="section">
            <div class="section-header">
                <h1>Admin Profile</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>
                        <div class="card-body">
                           

                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            

                                <div class="row">
                                    <!-- Profile Image -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Profile Image</label>
                                            <div class="text-center mb-3">
                                                <img src="{{ Auth::guard('admin')->check() && Auth::guard('admin')->user()->profile ? asset('uploads/admin/profile/'.Auth::guard('admin')->user()->profile) : asset('uploads/admin/profile/boy.png') }}"
                                                    class="rounded-circle"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                            </div>
                                            <input type="file" name="profile"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Other Fields -->
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ $admin->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ $admin->email }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>New Password (Optional)</label>
                                                    <input type="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror" autocomplete="one-time-code">
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="password_confirmation" autocomplete="one-time-code"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script>
        // Preview image before upload
        document.querySelector('input[name="image"]').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.rounded-circle').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
