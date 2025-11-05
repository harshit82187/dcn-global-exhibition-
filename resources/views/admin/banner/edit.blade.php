@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content" style="min-height: 641px;">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                            <h4>@lang('Edit') @lang('Banner')</h4>
                            <a href="{{ route('banner.index') }}" class="btn btn-info btn-sm">@lang('list')</a>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('banner.update', $banner->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">

                                    <!-- Title -->
                                    <div class="col-lg-6 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Title') <span
                                                    style="color:red">*</span></label>
                                            <div>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="@lang('Enter') @lang('Title')" required autofocus
                                                    value="{{ old('title', $banner->title) }}">
                                                @error('title')
                                                    <p style="color:red;font-size: 15px;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Heading -->
                                    <div class="col-lg-6 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Heading') <span
                                                    style="color:red">*</span></label>
                                            <div>
                                                <input type="text" name="heading" class="form-control"
                                                    placeholder="@lang('Enter') @lang('Heading')" required
                                                    value="{{ old('heading', $banner->heading) }}">
                                                @error('heading')
                                                    <p style="color:red;font-size: 15px;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-lg-12 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Description')</label>
                                            <textarea name="description" class="form-control" style="height:200px;" placeholder="@lang('Enter Description')">{{ old('description', $banner->description) }}</textarea>
                                            @error('description')
                                                <p style="color:red;font-size: 15px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Upload File -->
                                    <div class="col-lg-12 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Upload File/Image')</label>
                                            <input type="file" name="upload_file" class="form-control">
                                            @error('upload_file')
                                                <p style="color:red;font-size: 15px;">{{ $message }}</p>
                                            @enderror

                                            <!-- Show Old Image -->
                                            @if ($banner->image)
                                                <div class="mt-2">
                                                    <p>@lang('Old Image'):</p>
                                                    <img src="{{ asset('public/' . $banner->image) }}" alt="Banner Image"
                                                        style="max-width: 150px; height: auto;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-lg-12">
                                        <div>
                                            <button type="submit" class="btn btn-primary">@lang('Update')</button>
                                        </div>
                                    </div>
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
@endpush
