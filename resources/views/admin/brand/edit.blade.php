@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content" style="min-height: 641px;">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                            <h4>@lang('Edit') @lang('Brand')</h4>
                            <a href="{{ route('brand') }}" class="btn btn-info btn-sm">@lang('list')</a>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('brand.update', $brand->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">

                                    <!-- Title -->
                                    <div class="col-lg-12 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Name') <span
                                                    style="color:red">*</span></label>
                                            <div>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="@lang('Enter') @lang('Name')" required autofocus
                                                    autocomplete="one-time-code" value="{{ old('name', $brand->name) }}"">
                                                @if ($errors->has('name'))
                                                    <p style="color:red;font-size: 15px;">
                                                        {{ $errors->first('name') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>






                                    <!-- Upload File -->
                                    <!-- Upload File -->
                                    <div class="col-lg-12 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Upload File/Image')</label>
                                            <input type="file" name="image" class="form-control">

                                            @if ($errors->has('image'))
                                                <p style="color:red;font-size: 15px;">
                                                    {{ $errors->first('image') }}
                                                </p>
                                            @endif

                                            {{-- Show old image if exists --}}
                                            @if ($brand->image)
                                                <div class="mt-2">
                                                    <label class="form-label">@lang('Old Image')</label><br>
                                                    <img src="{{ asset('uploads/brand/' . $brand->image) }}"
                                                        alt="Old Image" width="150"
                                                        style="border:1px solid #ccc; padding:4px;">
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
    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote').summernote({
                height: 200, // set the height of the editor
                callbacks: {
                    onChange: function(contents, $editable) {
                        // Block 'summer' in the content
                        if (contents.toLowerCase().includes('summer')) {
                            alert('The word "summer" is not allowed.');
                            $('#summernote').summernote('code', contents.replace(/summer/gi, ''));
                        }

                        // Block URLs in the content
                        var urlPattern = /(https?:\/\/[^\s]+)/g;
                        if (urlPattern.test(contents)) {
                            alert('Links are not allowed.');
                            $('#summernote').summernote('code', contents.replace(urlPattern, ''));
                        }
                    }
                }
            });
        });
    </script>
@endpush
