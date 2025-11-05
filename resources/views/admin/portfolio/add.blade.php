@extends('admin.layouts.app')
@section('admin-content')
<div class="main-content" style="min-height: 641px;">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
						<h4>@lang('Add') @lang('Portfolio')</h4>
						<a href="{{ route('admin.portfolio') }}" class="btn btn-info btn-sm">@lang('Portfolio list')</a>
					</div>
					<div class="card-body">
						<form id="portfolio-store" action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row g-3">
								<!-- name -->
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Name') <span
											style="color:red">*</span></label>
										<div>
											<input type="text" name="name" class="form-control"
												placeholder="@lang('Enter') @lang('Name')" required autofocus
												autocomplete="one-time-code" value="{{ old('name') }}">
											@if ($errors->has('name'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('name') }}
											</p>
											@endif
										</div>
									</div>
								</div>
								<!-- years -->
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Year') <span
											style="color:red">*</span></label>
										<div>
											<input type="number" name="year" class="form-control"
												placeholder="@lang('Enter') @lang('year')" required autofocus
												autocomplete="one-time-code" value="{{ old('year') }}">
											@if ($errors->has('year'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('year') }}
											</p>
											@endif
										</div>
									</div>
								</div>
								<!-- Upload File -->
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Upload File/Image')<span style="color:red">*</span></label>
										<input type="file" name="image" class="form-control" accept=".jpeg,.jpg,.png,.webp" required>
										@if ($errors->has('image'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('image') }}
										</p>
										@endif
									</div>
								</div>
								<!-- Multiple Image Upload -->
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Upload Multiple Images')<span style="color:red">*</span></label>
										<input type="file" name="files[]" class="form-control" accept=".jpeg,.jpg,.png,.webp" multiple required>
										@if ($errors->has('files'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('files') }}
										</p>
										@endif
										@if ($errors->has('files.*'))
										@foreach ($errors->get('files.*') as $image_errors)
										@foreach ($image_errors as $error)
										<p style="color:red;font-size: 15px;">{{ $error }}</p>
										@endforeach
										@endforeach
										@endif
									</div>
								</div>
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Video') </label>
										<div>
											<input type="file" name="video" class="form-control"
												  autofocus
												autocomplete="one-time-code" value="{{ old('video') }}" accept="video/*">
											@if ($errors->has('video'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('video') }}
											</p>
											@endif
										</div>
									</div>
								</div>

								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Priority') <span
											style="color:red">*</span></label>
										<div>
											<input type="number" name="priority" class="form-control"
												 required autofocus
												autocomplete="one-time-code" value="{{ old('priority') }}">
											@if ($errors->has('priority'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('priority') }}
											</p>
											@endif
										</div>
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
	$(document).on('submit', '#portfolio-store', function() {
	    let btn = $('button[type="submit"]');
	    btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
	});
</script>
@endpush