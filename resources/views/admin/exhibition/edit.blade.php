@extends('admin.layouts.app')
@section('admin-content')
<style>
    .attachments, .image-attachment img {
        max-width: 150px;
        margin: 10px;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        height: 100px;
        object-fit: cover;
    }
</style>

@php
    $exhibitions = json_decode($exhibition->infos, true) ?? []; 
    $names = $exhibitions['name'] ?? [];
    $areas = $exhibitions['area'] ?? [];
    $images = !empty($exhibitions['ex_image']) ? json_decode($exhibitions['ex_image'], true) : [];

@endphp

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Edit Exhibition</h4>
                        <a href="{{ url('admin/exhibitions') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        <form id="exhibitions-update" action="{{ url('admin/exhibitions/' . $exhibition->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-lg-12 mb-3 image-attachment text-center">
                                    @if($exhibition->image)
                                        <a href="{{ asset($exhibition->image) }}" target="_blank" class="d-block mt-2">
                                            <img src="{{ asset($exhibition->image) }}" class="img-thumbnail" style="width:100px;height:100px;">
                                        </a>
                                    @endif
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Upload Title Image</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                    @error('image')
                                        <p style="color:red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Title Name <span style="color:red">*</span></label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title', $exhibition->title) }}">
                                    @error('title')
                                        <p style="color:red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label class="form-label">Exhibition Info <span style="color:red">*</span></label> <button type="button" class="btn btn-success add-ex">+</button>
                                </div>

                               @foreach($names as $index => $name)
                                    <div class="row col-lg-12 mb-3">
                                        <div class="col-lg-4 mb-3">
                                            <input type="text" name="name[]" class="form-control" placeholder="Enter Exhibition Name" required value="{{ $name }}">
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <input type="text" name="area[]" class="form-control" placeholder="Enter Area Name" required value="{{ $areas[$index] ?? '' }}">
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            <input type="file" name="ex_image[]" class="form-control">
                                            @if(!empty($images[$index]))
                                                <input type="hidden" name="old_ex_image[]" value="{{ $images[$index] }}">
                                                <a href="{{ asset($images[$index]) }}" target="_blank" class="d-block mt-2">
                                                 <img src="{{ asset($images[$index]) }}" class="img-thumbnail mt-2" width="80" height="80">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-1 mb-3">
                                            <button type="button" class="btn btn-danger remove-ex">-</button>
                                        </div>
                                    </div>                               
                                @endforeach

                                <span id="tagExs" class="col-lg-12"></span>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
    $(document).on("click", ".add-ex", function () {
        let tagEx = `
            <div class="row col-lg-12 mb-3">
                <div class="col-lg-4 mb-3">
                    <input type="text" name="name[]" class="form-control" placeholder="Enter Exhibition Name" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <input type="text" name="area[]" class="form-control" placeholder="Enter Area Name" required>
                </div>
                <div class="col-lg-3 mb-3">
                    <input type="file" name="ex_image[]" class="form-control">
                     <input type="hidden" name="old_ex_image[]" value="">
                </div>
                <div class="col-lg-1 mb-3">
                    <button type="button" class="btn btn-danger remove-ex">-</button>
                </div>
            </div>`;
        $("#tagExs").append(tagEx);
    });

    $(document).on("click", ".remove-ex", function () {
        $(this).closest(".row").remove();
    });

    $('#image').on('change', function(e) {
        const preview = $('.image-attachment').empty();
        [...e.target.files].forEach(file => {
            const reader = new FileReader();
            reader.onload = e => preview.append(
                `<img src="${e.target.result}" class="img-thumbnail m-1" style="width:100px;height:100px;">`
            );
            reader.readAsDataURL(file);
        });
    });

    $(document).on('submit', '#exhibitions-update', function () {
        let btn = $('button[type="submit"]');
        btn.html('<span class="spinner-border spinner-border-sm"></span> Updating...').prop('disabled', true);
    });
</script>
@endpush
