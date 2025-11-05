@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content" style="min-height: 641px;">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                            <h4>@lang('Edit') @lang('Project')</h4>
                            <a href="{{ route('project') }}" class="btn btn-info btn-sm">@lang('List')</a>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('project.update', $project->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">

                                    <!-- Client Name -->
                                   
                                    <!-- Project Date -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">@lang('Project Date') <span style="color:red">*</span></label>
                                        <input type="number" name="project_year" class="form-control"
                                            value="{{ old('project_year', $project->project_year) }}" required>
                                    </div>

                                    <!-- Duration -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">@lang('Project Location') <span style="color:red">*</span></label>
                                        <input type="text" name="location" class="form-control"
                                            value="{{ old('location', $project->location) }}" required>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">@lang('Image')</label><br>
                                        @if ($project->image)
                                            <img src="{{ asset('uploads/projects/' . $project->image) }}"
                                                width="80" height="80"><br><br>
                                        @endif
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-success">@lang('Update Project')</button>
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
