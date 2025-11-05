@extends('admin.layouts.app')
@section('admin-content')
<div class="main-content" style="min-height: 641px;">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
						<h4>@lang('Add') @lang('Services')</h4>
						<a href="{{ route('services') }}" class="btn btn-info btn-sm">Back</a>
					</div>

					

					<div class="card-body">
						<form id="service-store" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row g-3">
                                <div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Upload File/Image')<span style="color:red">*</span></label>
										<input type="file" name="image"  class="form-control" required accept=".jpeg,.jpg,.png,.webp" >
										@if ($errors->has('image'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('image') }}
										</p>
										@endif
									</div>
								</div>
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">Upload Home Page Service Image<span style="color:red">*</span></label>
										<input type="file" name="home_page_img"  class="form-control" required accept=".jpeg,.jpg,.png,.webp" >
										@if ($errors->has('home_page_img'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('home_page_img') }}
										</p>
										@endif
									</div>
								</div>
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">@lang('Name') <span style="color:red">*</span></label>
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
								<!-- Title -->
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">Title <span
											style="color:red">*</span></label>
										<div>
										<textarea name="title" class="form-control" style="height:200px;" placeholder="@lang('Enter title')"></textarea>
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
										<label class="form-label">@lang('Description')</label>
										<textarea name="description" class="form-control editor" style="height:200px;"
											placeholder="@lang('Enter Description')"></textarea>
										@if ($errors->has('description'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('description') }}
										</p>
										@endif
									</div>
								</div>

								<div class="tab-block border p-3 col-lg-12 mb-3" style="position: relative;">
									<a href="javascript:void(0)" class="btn btn-dark btn-sm " id="add-tab" style="position: absolute; top: 10px; right: 10px;">Add Tab</a>
									
									<div class="mb-3">
										<label class="form-label">Tab Title</label>
										<textarea name="tab_title[]" class="form-control" required style="height:200px;" placeholder="Enter Tab Title"></textarea>
									</div>

									<div class="mb-3">
										<label class="form-label">Tab Description</label>
										<textarea name="tab_description[]" class="form-control editor" required style="height:200px;" placeholder="Enter Description"></textarea>
									</div>
								</div>


								<div  class="col-lg-12 mb-3" id="clone-tab"></div>
								
								
								
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
	$(document).ready(function () {
		$('#add-tab').on('click', function () {
			const cloneRow = `
				<div class="tab-block border p-3 mb-3" style="position: relative;">
					<a href="javascript:void(0)" class="btn btn-danger btn-sm remove-tab" style="position: absolute; top: 10px; right: 10px;">Delete Tab</a>
					
					<div class="mb-3">
						<label class="form-label">Tab Title</label>
						<textarea name="tab_title[]" class="form-control" style="height:200px;" placeholder="Enter Tab Title"></textarea>
					</div>

					<div class="mb-3">
						<label class="form-label">Tab Description</label>
						<textarea name="tab_description[]" class="form-control editor" style="height:200px;" placeholder="Enter Description"></textarea>
					</div>
				</div>
			`;

			const $newTab = $(cloneRow);
			$('#clone-tab').append($newTab);

				$newTab.find('.editor').each(function () {
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


		$(document).on('click', '.remove-tab', function () {
			$(this).closest('.tab-block').remove();
		});
		$(document).on('submit', '#service-store', function() {
			let btn = $('button[type="submit"]');
			btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
		});
	});
</script>

@endpush