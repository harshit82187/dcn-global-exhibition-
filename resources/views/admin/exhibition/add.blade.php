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
@php
    $oldNames = old('name', []);
    $oldAreas = old('area', []);
    $oldExImages = old('ex_image', []);
@endphp
<div class="main-content" style="min-height: 641px;">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
						<h4>Add Exhibitions </h4>
						<a href="{{ url('admin/exhibitions') }}" class="btn btn-info btn-sm">Back</a>
					</div>
					<div class="card-body">
						<form id="exhibitions-store" action="{{ url('admin/exhibitions') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row g-3">
								<div class="col-lg-12 mb-3"><span class="image-attachment" ></span></div>
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Upload Title Image')</label>
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
										<label class="form-label">@lang('Title Name') <span	style="color:red">*</span></label>
										<div>
											<input type="text" name="title" class="form-control @error('title') is-invalid @enderror"	placeholder="@lang('Enter Title') @lang('Name')"  autofocus	autocomplete="one-time-code" required value="{{ old('title') }}">
											@if ($errors->has('title'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('title') }}
											</p>
											@endif
										</div>
									</div>
								</div>
                                <div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">@lang('Exhibition Info') <span style="color:red">*</span></label>										
									</div>
								</div>
                               @if(count($oldNames) > 0)
                                    @foreach($oldNames as $index => $val)
                                    <div class="row col-lg-12 mb-3">
                                        <div class="col-lg-4 mb-3">
                                            <input type="text" name="name[]" class="form-control" placeholder="Enter Exhibition Name" required value="{{ $val }}">
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <input type="text" name="area[]" class="form-control" placeholder="Enter Area Name" required value="{{ old('area.' . $index) }}">
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            <input type="file" name="ex_image[]" class="form-control" {{ old('ex_image.' . $index) ? '' : 'required' }}>
                                        </div>
                                        <div class="col-lg-1 mb-3">
                                            <button type="button" class="btn btn-danger remove-ex">-</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                        {{-- If no old inputs, show one default row --}}
                                        <div class="row col-lg-12 mb-3">
                                            <div class="col-lg-4 mb-3">
                                                <input type="text" name="name[]" class="form-control" placeholder="Enter Exhibition Name" required>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <input type="text" name="area[]" class="form-control" placeholder="Enter Area Name" required>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <input type="file" name="ex_image[]" class="form-control" required>
                                            </div>
                                            <div class="col-lg-1 mb-3">
                                                <button type="button" class="btn btn-success add-ex">+</button>
                                            </div>
                                        </div>
                                @endif
                                <span id="tagExs" class="col-lg-12" ></span>
								
								
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
        $(document).on('submit', '#exhibitions-store', function() {
            let btn = $('button[type="submit"]');
            btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
        });
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
                        <input type="file" name="ex_image[]" class="form-control" required>
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
</script>
@endpush