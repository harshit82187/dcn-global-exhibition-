@extends('admin.layouts.app')
@section('admin-content')
<div class="main-content" style="min-height: 641px;">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
						<h4>Edit Service</h4>
						<a href="{{ route('services') }}" class="btn btn-info btn-sm">@lang('list')</a>
					</div>
					<div class="card-body">
						<form id="service-update" action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="row g-3">
								<div class="col-lg-6 mb-3 text-center">
									<div>
										<a href="{{ asset($service->image) }}" target="_blank"><img src="{{ asset($service->image) }}" alt="{{ asset($service->image) }}" height="250px" width="450px" ></a>
									</div>
								</div>
								@if($service->home_page_img != null)
								<div class="col-lg-6 mb-3 text-center">
									<div>
										<a href="{{ asset($service->home_page_img) }}" target="_blank"><img src="{{ asset($service->home_page_img) }}" alt="{{ asset($service->home_page_img) }}" height="250px" width="450px" ></a>
									</div>
								</div>
								@endif
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">@lang('Upload File/Image')</label>
										<input type="file" name="image"  class="form-control" accept=".jpeg,.jpg,.png,.webp">
										@if ($errors->has('image'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('image') }}
										</p>
										@endif
									</div>
								</div>
								<div class="col-lg-6 mb-3">
									<div>
										<label class="form-label">Upload Home Page Service Image</label>
										<input type="file" name="home_page_img"  class="form-control" accept=".jpeg,.jpg,.png,.webp">
										@if ($errors->has('home_page_img'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('home_page_img') }}
										</p>
										@endif
									</div>
								</div>
								<div class="col-lg-12 mb-3">
									<div>
										<label class="form-label">@lang('Name') <span
											style="color:red">*</span></label>
										<div>
											<input type="text" name="name" class="form-control"
												placeholder="@lang('Enter') @lang('Name')" required autofocus
												autocomplete="one-time-code" value="{{ old('name', $service->name) }}">
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
											<textarea name="title" class="form-control" style="height:200px;" placeholder="@lang('Enter title')">{{ old('title', $service->title) }}</textarea>
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
											placeholder="@lang('Enter Description')">{{ old('description', $service->description) }}</textarea>
										@if ($errors->has('description'))
										<p style="color:red;font-size: 15px;">
											{{ $errors->first('description') }}
										</p>
										@endif
									</div>
								</div>
								<div id="existing-tabs">
									@foreach($decodedTabs as $tab)
									<div class="tab-block border p-3 col-lg-12 mb-3" style="position: relative;">
										<a href="javascript:void(0)" class="btn btn-danger btn-sm remove-tab" style="position: absolute; top: 10px; right: 10px;">Delete Tab</a>
										<div class="mb-3">
											<label class="form-label">Tab Title</label>
											<textarea name="tab_title[]" class="form-control" required style="height:200px;" placeholder="Enter Tab Title">{{ $tab['title'] }}</textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Tab Description</label>
											<textarea name="tab_description[]" class="form-control editor" required style="height:200px;" placeholder="Enter Description">{{ $tab['description'] }}</textarea>
										</div>
									</div>
									@endforeach
								</div>
								<div  class="col-lg-12 mb-3" id="clone-tab"></div>
								<!-- Submit Button -->
								<div class="col-lg-12">
									<div>
										<a href="javascript:void(0)" class="btn btn-dark btn-sm" id="add-tab" style="position: absolute; top: 10px; right: 10px;">Add Tab</a>
										<button type="submit" class="btn btn-primary">Update Service</button>
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
	
	            height: 300, // Adjust the editor height
	
	            toolbarSticky: false, // Toolbar will not stick on scroll
	
	            defaultMode: "1", // Start in WYSIWYG mode
	
	            uploader: {
	
	                insertImageAsBase64URI: true // Allows direct image uploads
	
	            }
	
	        });
	
	    });
	
	});
	
</script>
<script>
	$(document).ready(function () {
	
	   // Add Tab functionality
	
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
	
	
	
	       // Initialize Jodit editor for the new tab's description
	
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
	
	
	
	   // Remove Tab functionality
	
	       $(document).on('click', '.remove-tab', function () {
	
	           $(this).closest('.tab-block').remove();
	
	       });
	
	
	
	       $(document).on('submit', '#service-update', function() {
	
	           let btn = $('button[type="submit"]');
	
	           btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
	
	       });
	
	   });
	
</script>
@endpush