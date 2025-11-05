@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content demo">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>@lang('Project List')</h4>
                            <div class="text-end">
                                {{-- <form action="" method="GET" class="d-inline">
                                    <input type="text" name="search" placeholder="@lang('search Brand')"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary btn-sm">@lang('search')</button>
                                </form> --}}
                                <a href="{{ route('project.create') }}" class="btn btn-info btn-sm">@lang('Add')</a>

                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>@lang('SL')</th>
                                        <th>@lang('Project Year')</th>
                                        <th>@lang('Project Location')</th>
                                        <th>@lang('Images')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($project as $index => $projects)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $projects->project_year }}</td>
                                            <td>{{ $projects->location }}</td>


                                            <td>
                                                @if ($projects->image)
                                                    <img src="{{ asset('uploads/projects/' . $projects->image) }}"
                                                        alt="Image" style="max-width: 50px; max-height: 80px;">
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td>


                                            <td>
                                                <form action="{{ route('project.edit', $projects->id) }}" method="GET"
                                                    style="display: inline;">
                                                    <button type="submit"
                                                        class="btn btn-warning btn-sm">@lang('Edit')</button>
                                                </form>
                                                <form action="{{ route('project.destroy', $projects->id) }}" method="POST"
                                                    style="display:inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm">@lang('Delete')</button>
                                                </form>

                                        </tr>
                                    @endforeach
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
