@extends('admin.layouts.app')
@section('admin-content')
<div class="main-content" style="min-height: 641px;">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
						<h4>@lang('Edit') @lang('Portfolio')</h4>
						<a href="{{ route('admin.portfolio') }}" class="btn btn-info btn-sm">@lang('List')</a>
					</div>
					<div class="card-body">
						<form id="portfolio-update" action="{{ route('portfolio.update', $portfolio->id) }}" method="POST"
							enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row g-3">
								<!-- name -->
								<!-- name -->
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">@lang('Name') <span
											style="color:red">*</span></label>
										<div>
											<input type="text" name="name" class="form-control"
												placeholder="@lang('Enter') @lang('Name')" required autofocus
												autocomplete="one-time-code"
												value="{{ old('name', $portfolio->name ?? '') }}">
											@if ($errors->has('name'))
											<p style="color:red; font-size: 15px;">
												{{ $errors->first('name') }}
											</p>
											@endif
										</div>
									</div>
								</div>
								<!-- years -->
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">@lang('Year') <span
											style="color:red">*</span></label>
										<div>
											<input type="number" name="year" class="form-control"
												placeholder="@lang('Enter') @lang('year')" required autofocus
												autocomplete="one-time-code"
												value="{{ old('year', $portfolio->year) }}">
											@if ($errors->has('year'))
											<p style="color:red;font-size: 15px;">
												{{ $errors->first('year') }}
											</p>
											@endif
										</div>
									</div>
								</div>
								<!-- Upload File -->
								<!-- Upload File -->
								<div class="col-lg-12
									mb-3">
									<div>
										<label class="form-label">@lang('Upload File/Image')</label>
										<input type="file" name="image" class="form-control">
										@if ($errors->has('upload_file'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('upload_file') }}
										</p>
										@endif
										{{-- Show old image if exists --}}
										@if ($portfolio->image)
										<div class="mt-2">
											<label class="form-label">@lang('Old Image')</label><br>
											<img src="{{ asset($portfolio->image) }}"
												alt="Old Image" width="150"
												style="border:1px solid #ccc; padding:4px;">
										</div>
										@endif
									</div>
								</div>
								<!-- Multiple Images Upload -->
								<div class="col-lg-12 mb-3">
									<label class="form-label">@lang('Upload Multiple Images')</label>
									<input type="file" name="files[]" class="form-control" multiple>
									@error('files')
									<p style="color:red;font-size: 15px;">{{ $message }}</p>
									@enderror
									{{-- Show existing uploaded images --}}
									@if (!empty($portfolio->files))
									<div class="mt-2">
										<label class="form-label">@lang('Old Uploaded Images')</label><br>
										@foreach (json_decode($portfolio->files) as $img)
										<img src="{{ asset($img) }}" width="100"
											style="border:1px solid #ccc; padding:3px; margin:4px;">
										@endforeach
									</div>
									@endif
								</div>

								<div class="col-lg-6 mb-3">
									<label class="form-label">@lang('Upload Video')</label>
									<input type="file" name="video" accept="video/*" class="form-control">
									@error('video')
									<p style="color:red;font-size: 15px;">{{ $message }}</p>
									@enderror
									{{-- Show existing uploaded images --}}
									 @if ($portfolio->video)
										<div class="mt-2">
											<label class="form-label">@lang('Old Video')</label><br>
											<video width="300" height="200" controls style="border:1px solid #ccc; padding:4px;">
												<source src="{{ asset($portfolio->video) }}" type="video/mp4">
												Your browser does not support the video tag.
											</video>
										</div>
									@endif
								</div>

								<div class="col-lg-6 mb-3">
									<label class="form-label">@lang('Priority')<span class="text-danger">*</span></label>
									<input type="number" name="priority"  class="form-control" value="{{ $portfolio->priority }}" required>
									@error('priority')
									<p style="color:red;font-size: 15px;">{{ $message }}</p>
									@enderror
									
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
	$(document).on('submit', '#portfolio-update', function() {
	    let btn = $('button[type="submit"]');
	    btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
	});
</script>
@endpush