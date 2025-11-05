@extends('admin.layouts.app')
@section('admin-content')
<style>
    .attachments, .image-attachment img{
        max-width: 150px;
        margin: 10px;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        height: 100px;
        object-fit: cover;
    }
</style>
<div class="main-content" style="min-height: 641px;">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
						<h4>Edit Global Presence </h4>
						<a href="{{ route('admin.global-presence') }}" class="btn btn-info btn-sm">Back</a>
					</div>				
					<div class="card-body">
						<form id="global-presence-update" action="{{ route('admin.global-presence.update', $globalPresence->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                @if($globalPresence->image)
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label d-block">Current Image:</label>
                                    <img src="{{ asset($globalPresence->image) }}" alt="Image" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                                @endif
                                <!-- Image Field -->
                                <div class="col-lg-12 mb-3"><span class="image-attachment" ></span></div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Upload File/Image</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept=".jpeg,.jpg,.png,.webp,image/*">
                                    <small>Leave empty if you don't want to update</small>
                                    @error('image') <p style="color:red;">{{ $message }}</p> @enderror
                                </div>

                                <!-- Name -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $globalPresence->name) }}" required>
                                    @error('name') <p style="color:red;">{{ $message }}</p> @enderror
                                </div>

                                <!-- Title -->
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <textarea name="title" class="form-control @error('title') is-invalid @enderror" style="height: 200px;" required>{{ old('title', $globalPresence->title) }}</textarea>
                                    @error('title') <p style="color:red;">{{ $message }}</p> @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control editor @error('description') is-invalid @enderror" style="height:200px;" required>{{ old('description', $globalPresence->description) }}</textarea>
                                    @error('description') <p style="color:red;">{{ $message }}</p> @enderror
                                </div>

                                <!-- Latest Work Info -->
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Our Latest Work Information <span class="text-danger">*</span></label>
                                    <textarea name="latest_work_info" class="form-control editor @error('latest_work_info') is-invalid @enderror" style="height:200px;" required>{{ old('latest_work_info', $globalPresence->latest_work_info) }}</textarea>
                                    @error('latest_work_info') <p style="color:red;">{{ $message }}</p> @enderror
                                </div>

                                @if($globalPresence->gallery)
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label d-block">Current Gallery Images:</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach(json_decode($globalPresence->gallery) as $image)
                                        <div>
                                            <img src="{{ asset($image) }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Gallery Field -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Upload Gallery (You Can Upload Multiple Images)</label>
                                    <input type="file" name="gallery[]" id="gallery" class="form-control @error('gallery') is-invalid @enderror" accept=".jpeg,.jpg,.png,.webp,image/*" multiple>
                                    <small>Leave empty if you don't want to update gallery.</small>
                                    @error('gallery') <p style="color:red;">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-lg-12 mb-3"><span class="attachments" ></span></div>
                                <!-- Submit -->
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
    $(document).ready(function() {
        $('.editor').each(function() {
            new Jodit(this, {
                height: 300,
                toolbarSticky: false, 
                defaultMode: "1", 
                uploader: {
                    insertImageAsBase64URI: true 
                }
            });
        });
    });
</script>
<script>
	$('#gallery').on('change', function(e) {
        const preview = $('.attachments').empty();
        [...e.target.files].forEach(file => {
            const reader = new FileReader();
            reader.onload = e => preview.append(
                file.type.startsWith('image/') ?
                `<img src="${e.target.result}" class="img-thumbnail m-1" style="width:100px;height:100px;">` :
                `<div class="border p-2 m-1">${file.name}</div>`
            );
            reader.readAsDataURL(file);
        });
    });
    $('#image').on('change', function(e) {
        const preview = $('.image-attachment').empty();
        [...e.target.files].forEach(file => {
            const reader = new FileReader();
            reader.onload = e => preview.append(
                file.type.startsWith('image/') ?
                `<img src="${e.target.result}" class="img-thumbnail m-1" style="width:100px;height:100px;">` :
                `<div class="border p-2 m-1">${file.name}</div>`
            );
            reader.readAsDataURL(file);
        });
    });
    $(document).on('submit', '#global-presence-update', function() {
        let btn = $('button[type="submit"]');
        btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
    });
</script>

@endpush