@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content" style="min-height: 641px;">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                            <h4>@lang('Add') @lang('aboutsus')</h4>
                            <a href="{{ route('aboutus') }}" class="btn btn-info btn-sm">@lang('list')</a>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">

                                    <!-- Title -->
                                    <div class="col-lg-12 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Title') <span
                                                    style="color:red">*</span></label>
                                            <div>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="@lang('Enter') @lang('Title')" required autofocus
                                                    autocomplete="one-time-code" value="{{ old('chapter_name') }}">
                                                @if ($errors->has('chapter_name'))
                                                    <p style="color:red;font-size: 15px;">
                                                        {{ $errors->first('chapter_name') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Description -->
                                    <div class="col-lg-12 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Description')</label>
                                            <textarea name="description" class="form-control" id="summernote" style="height:200px;" placeholder="@lang('Enter Description')"></textarea>
                                            @if ($errors->has('description'))
                                                <p style="color:red;font-size: 15px;">
                                                    {{ $errors->first('description') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                    <!-- Upload File -->
                                    <div class="col-lg-12 mb-3">
                                        <div>
                                            <label class="form-label">@lang('Upload File/Image')</label>
                                            <input type="file" name="upload_file" class="form-control">
                                            @if ($errors->has('upload_file'))
                                                <p style="color:red;font-size: 15px;">
                                                    {{ $errors->first('upload_file') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-lg-12">
                                        <div>
                                            <button type="submit" class="btn btn-primary">@lang('submit')</button>
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
