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
						<h4>Add Global Presence </h4>
						<a href="{{ route('admin.global-presence') }}" class="btn btn-info btn-sm">Back</a>
					</div>
					<div class="card-body">
						<form id="global-presence-store" action="{{ route('admin.global-presence.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row g-3">
								<div class="col-lg-12 mb-3"><span class="image-attachment" ></span></div>
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Upload File/Image')</label>
										<input type="file" name="image" id="image"  class="form-control @error('image') is-invalid @enderror" accept=".jpeg,.jpg,.png,image/jpeg,image/jpg,image/png,image/webp" required >
										@if ($errors->has('image'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('image') }}
										</p>
										@endif
									</div>
								</div>
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Name') <span	style="color:red">*</span></label>
										<div>
											<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"	placeholder="@lang('Enter') @lang('Name')"  autofocus	autocomplete="one-time-code" required value="{{ old('name') }}">
											@if ($errors->has('name'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('name') }}
											</p>
											@endif
										</div>
									</div>
								</div>
								<!-- Title -->
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">Title <span	style="color:red">*</span></label>
										<div>
											<textarea name="title" class="form-control @error('title') is-invalid @enderror" style="height:200px;" placeholder="@lang('Enter title')" value="{{ old('title') }}" required></textarea>
											@if ($errors->has('title'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('title') }}
											</p>
											@endif
										</div>
									</div>
								</div>
								<!-- Description -->
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">@lang('Description') <span class="text-danger" >*</span></label>
										<textarea name="description" class="form-control editor @error('description') is-invalid @enderror" style="height:200px;"	placeholder="@lang('Enter Description')" value="{{ old('description') }}" required></textarea>
										@if ($errors->has('description'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('description') }}
										</p>
										@endif
									</div>
								</div>
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">Our Lates Work Infomration <span class="text-danger" >*</span> </label>
										<textarea name="latest_work_info" class="form-control editor @error('latest_work_info') is-invalid @enderror" style="height:200px;" placeholder="@lang('Enter Latest Work Information')" value="{{ old('latest_work_info') }}" required></textarea>
										@if ($errors->has('latest_work_info'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('latest_work_info') }}
										</p>
										@endif
									</div>
								</div>
								<div class="col-lg-12 mb-3"><span class="attachments" ></span></div>
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">Upload Gallery (You Can Upload Multiple Images) <span class="text-danger" >*</span> </label>
										<input type="file" name="gallery[]" multiple id="gallery"  accept=".jpeg,.jpg,.png,image/jpeg,image/jpg,image/png,image/webp" class="form-control @error('gallery') is-invalid @enderror" required>
										@if ($errors->has('gallery'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('gallery') }}
										</p>
										@endif
									</div>
								</div>
								<!-- Submit Button -->
								<div class="col-lg-12">
									<div>
										<button type="submit" class="btn btn-primary">@lang('Submit')</button>
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
	   $(document).on('submit', '#global-presence-store', function() {
	       let btn = $('button[type="submit"]');
	       btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
	   });
</script>
@endpush