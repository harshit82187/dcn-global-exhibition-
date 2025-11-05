@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content" style="min-height: 641px;">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                            <h4>@lang('Add') @lang('Project')</h4>
                            <a href="{{ route('project') }}" class="btn btn-info btn-sm">@lang('List')</a>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">

                                    <!-- Project Year -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">@lang('Project Year') <span class="text-danger">*</span></label>
                                        <input type="number" name="project_year" class="form-control"
                                            placeholder="Enter Project Year" required autofocus
                                            value="{{ old('project_year') }}">
                                        @error('project_year')
                                            <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Project Location -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">@lang('Project Location') <span class="text-danger">*</span></label>
                                        <input type="text" name="location" class="form-control"
                                            placeholder="Enter Project Location " required
                                            value="{{ old('location') }}">
                                        @error('location')
                                            <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">@lang('Image')</label>
                                        <input type="file" name="image" id="project-image" class="form-control" accept="image/*">
                                        @error('image')
                                            <p class="text-danger" style="font-size: 15px;">{{ $message }}</p>
                                        @enderror
                                        <div class="project-image d-flex flex-wrap justify-content-start mt-2"></div>
                                    </div>

                                   

                                    <!-- Submit Button -->
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">@lang('submit')</button>
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
    $('#project-image').on('change', function(e) {
      const preview = $('.project-image').empty();
      [...e.target.files].forEach((file, index) => {
          const reader = new FileReader();
          reader.onload = e => {
              const isImage = file.type.startsWith('image/');
              const html = `
                  <div class="file-preview position-relative d-inline-block m-1">
                      ${isImage ?
                          `<img src="${e.target.result}" class="img-thumbnail" style="width:160px;height:150px;">` :
                          `<div class="border p-2" style="width:160px;height:150px;overflow:hidden;">${file.name}</div>`
                      }
                  </div>`;
              preview.append(html);
          };
          reader.readAsDataURL(file);
      });
    });
  

</script>
@endpush
