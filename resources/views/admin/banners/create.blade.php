@extends('admin.layouts.app')
@section('admin-content')
    <div class="main-content" style="min-height: 641px;">
        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                            <h4>@lang('Add') @lang('Slider')</h4>
                            <a href="{{ route('banners.index') }}" class="btn btn-info btn-sm">@lang('list')</a>
                        </div>
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter banner title" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Subtitle</label>
                                    <input type="text" name="subtitle" class="form-control" placeholder="Enter banner subtitle" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Description</label>
                                    <input type="text" name="description" placeholder="Enter Description" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Add Slider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
