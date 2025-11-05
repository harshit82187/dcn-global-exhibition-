@extends('admin.layouts.app')
@section('admin-content')


<div class="main-content demo">
	<section class="section">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4>@lang('Services List')</h4>
						<div class="text-end">
							{{-- 
							<form action="" method="GET" class="d-inline">
								<input type="text" name="search" placeholder="@lang('search Banner')"
									value="{{ request('search') }}">
								<button type="submit" class="btn btn-primary btn-sm">@lang('search')</button>
							</form>
							--}}
							<a href="{{ route('services.create') }}" class="btn btn-info btn-sm">@lang('Add')</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>SL</th>
                                    <th>Image</th>
									<th>@lang('Name')</th>
									<th>@lang('Description')</th>									
									<th>@lang('Action')</th>
								</tr>
							</thead>
							<tbody>
                                @if(isset($services) && $services->count())
                                    @foreach ($services as $index => $service)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if ($service->image)
                                            <img src="{{ asset($service->image) }}" alt="Image " class="round-circle"  style="max-width: 70px; max-height: 80px;">
                                            @else
                                            <span>No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Illuminate\Support\Str::limit(strip_tags($service->description, 500)) }} <i class="fa fa-info-circle" data-toggle="tooltip" title="{{ strip_tags($service->description) }}"></i> 
                                        </td>
                                        
                                        <td class="d-flex" style="gap:5px;">
                                           <div  class="d-flex justify-content-center align-items-center gap-2" style="gap:5px;">
												 <form action="{{ route('services.edit', $service->id) }}" method="GET"
                                                style="display: inline;">
                                                <button type="submit"
                                                    class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm">@lang('delete')</button>
                                            </form>
										   </div>
										</td>
                                    </tr>
								    @endforeach
                                @else 
                                    <tr>
                                        <td colspan="5" class="text-danger text-center" >No Service Found!</td>
                                    </tr>
                                @endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
@push('script')
<script>
	function deleteUser(id) {
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
	            window.location.href = "".replace(':id', id);
	        }
	    });
	}
</script>
@endpush