@extends('admin.layouts.app')

@section('admin-content')
    <h1>Add New Contact Detail</h1>
    <form action="{{ route('contact_details.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Phone Numbers (one per line)</label>
            <textarea name="phone_nos[]" class="form-control @error('phone_nos.*') is-invalid @enderror" rows="4" placeholder="Enter phone numbers, one per line"></textarea>
            @error('phone_nos.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Addresses (one per line, optional)</label>
            <textarea name="addresses[]" class="form-control @error('addresses.*') is-invalid @enderror" rows="4" placeholder="Enter addresses, one per line"></textarea>
            @error('addresses.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('contact_details.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection