@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content demo">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>@lang('Abouts Banner List')</h4>
                            <div class="text-end">
                                <form action="" method="GET" class="d-inline">
                                    <input type="text" name="search" placeholder="@lang('search Banner')"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary btn-sm">@lang('search')</button>
                                </form>
                                <a href="{{ route('banner.create') }}" class="btn btn-info btn-sm">@lang('add')</a>

                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <h5>@lang('tutorial')</h5> --}}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>@lang('id')</th>
                                        <th>@lang('Title')</th>
                                        <th>@lang('Hading')</th>
                                        <th>@lang('Description')</th>
                                        {{-- <th>@lang('Images')</th> --}}
                                        <th>@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $index => $banner)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $banner->title }}</td>
                                            <td>{{ $banner->heading }}</td>
                                            <td>{{ $banner->description }}</td>
                                            {{-- <td>
                                                @if ($banner->image)
                                                    @foreach (json_decode($banner->image) as $img)
                                                        <img src="{{ asset('public/' . $img) }}" alt="Image"
                                                            style="max-width: 100px; max-height: 80px; margin-right: 5px;">
                                                    @endforeach
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td> --}}




                                            <td>
                                                <form action="{{ route('aboutbanner.edit', $banner->id) }}" method="GET"
                                                    style="display: inline;">
                                                    <button type="submit"
                                                        class="btn btn-warning btn-sm">@lang('edit')</button>
                                                </form>
                                                {{-- <form action="{{ route('banner.destroy', $banner->id) }}" method="POST"
                                                    style="display:inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm">@lang('delete')</button>
                                                </form> --}}

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
