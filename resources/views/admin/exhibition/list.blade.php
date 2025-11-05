@extends('admin.layouts.app')
@section('admin-content')
<div class="main-content demo">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4>@lang('Exhibition List')</h4>
						<div class="text-end">							
							<a href="{{ url('admin/exhibitions/create') }}" class="btn btn-info btn-sm">@lang('Add')</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>SL</th>
									<th>Name</th>
                                    <th>Status</th>
									<th>@lang('Action')</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($exhibitions) && $exhibitions->count())
								@foreach ($exhibitions as $index => $exhibition)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td class="d-flex align-items-center gap-10 w-max-content">
										@if ($exhibition->image)
										    <a href="{{ asset($exhibition->image) }}" target="_blank"><img src="{{ asset($exhibition->image) }}" alt="{{ asset($exhibition->image) }}" class="avatar"  width="150"></a>  
										@endif
                                        <div class="mr-5">{{  $exhibition->title ?? '' }}</div>
									</td>
                                    <td>
                                    <label class="switch">
                                        <input type="checkbox" class="status-toggle" data-id="{{ $exhibition->id }}" {{ $exhibition->status ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>                                       
                                    </td>
									
									<td>
										<div class="d-flex justify-content-center align-items-center gap-2" style="gap:5px;">
                                            <a href="{{ url('admin/exhibitions/'.$exhibition->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
											<button onclick="deleteExhibition({{ $exhibition->id }})" class="btn btn-danger btn-sm">@lang('delete')</button>
										</div>
									</td>
                                    <form id="delete-form" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
								</tr>
								@endforeach
								@else 
								<tr>
									<td colspan="5" class="text-danger text-center" >No Global Presence Found!</td>
								</tr>
								@endif
							</tbody>
						</table>
                        <div class="d-flex justify-content-center">
                            {{ $exhibitions->links() }}
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
@push('script')
<script>
	function deleteExhibition(id) {
	    Swal.fire({
	        title: 'Are you sure?',
	        text: '',
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#d33',
	        cancelButtonColor: '#3085d6',
	        confirmButtonText: 'Delete',
	        customClass: {
	            popup: 'swal2-large',
	            content: 'swal2-large'
	        }
	    }).then((result) => {
	        if (result.isConfirmed) {
                const form = document.getElementById('delete-form');
                form.action = "{{ url('admin/exhibitions') }}/" + id;
                form.submit();
	        }
	    });
	}
    $(document).ready(function() {
		$('.status-toggle').change(function() {
			var status = $(this).prop('checked') == true ? 1 : 0;
			var exhibition_id = $(this).data('id');
	
			$.ajax({
				url: '{{ url('admin/exhibitions-status-change') }}',
				type: 'POST',
				data: {
					'_token': $('meta[name="csrf-token"]').attr('content'),
					'exhibition_id': exhibition_id,
					'status': status
				},
				success: function(response) {
					iziToast.info({
						title: 'Info',
						message: response.message,
						position: 'topRight',
						timeout: 3000,
					});
				},
				error: function (xhr) {
					let errorMessage = 'Something went wrong. Please try again.';
					if (xhr.responseJSON && xhr.responseJSON.message) {
						errorMessage = xhr.responseJSON.message;
					}
					iziToast.error({
						title: 'Error :',
						message: errorMessage,
                        position: 'topRight',
						timeout: 4000,
						backgroundColor: '#F0D5B6',
						titleColor: '#000', 
						messageColor: '#000', 
						titleSize: '17px',
						messageSize: '15px',
						titleLineHeight: '15px',
						messageLineHeight: '16px',
						titleFontWeight: '700', 
						messageFontWeight: '700'
					});
				}
			});
		});
	});
</script>
@endpush