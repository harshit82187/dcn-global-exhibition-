@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content demo">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>@lang('Portfolio List')</h4>
                            <div class="text-end">
                                {{-- <form action="" method="GET" class="d-inline">
                                    <input type="text" name="search" placeholder="@lang('search Banner')"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary btn-sm">@lang('search')</button>
                                </form> --}}
                                <a href="{{ route('portfolio.create') }}" class="btn btn-info btn-sm">@lang('Add')</a>

                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>@lang('SL')</th>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Priority')</th>
                                        <th>@lang('year')</th>
                                        <th>@lang('Images')</th>
                                        <th>@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($portfolio as $index => $blog)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ Illuminate\Support\Str::limit($blog->name, 50) }} <i class="fa fa-info-circle" data-toggle="tooltip" title="{{ $blog->name }}"></i></td>
                                            <td>{{ $blog->priority ?? 'N/A' }}</td>
                                            <td>{{ $blog->year }}</td>

                                            <td>
                                                @if ($blog->image)
                                                    <img src="{{ asset($blog->image) }}"
                                                        alt="Image" style="max-width:70px; max-height: 80px;">
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td>


                                            <td>
                                                <div class="d-flex" style="gap:3px;">
                                                     <form action="{{ route('portfolio.edit', $blog->id) }}" method="GET"
                                                    style="display: inline;">
                                                    <button type="submit"
                                                        class="btn btn-warning btn-sm">@lang('Edit')</button>
                                                </form>
                                                <form action="{{ route('portfolio.destroy', $blog->id) }}" method="POST"
                                                    style="display:inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm">@lang('Delete')</button>
                                                </form>

                                                </div>
                                               

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{ $portfolio->links('pagination::bootstrap-5') }}
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
