@extends('admin.layouts.app')

@section('admin-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg">
                        <div class="card-header bg-warning text-white text-center">
                            <h4>Update Contact Details</h4>
                        </div>
                        <div class="card-body">
                            <h1>Edit Contact Detail</h1>
                            <form action="{{ route('contact_details.update', $contact->contact_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Phone Numbers</label>
                                    <div id="phone-fields">
                                        @foreach ($contact->phone_nos as $index => $phone)
                                            <div class="input-group mb-2">
                                                <input  name="phone_nos[]" class="form-control @error('phone_nos.' . $index) is-invalid @enderror" value="{{ $phone }}" placeholder="Enter phone number">
                                                <button type="button" class="btn btn-danger remove-phone">Remove</button>
                                                @error('phone_nos.' . $index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                        @if (empty($contact->phone_nos))
                                            <div class="input-group mb-2">
                                                <input  name="phone_nos[]" class="form-control" placeholder="Enter phone number">
                                                <button type="button" class="btn btn-danger remove-phone">Remove</button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-success mt-2" id="add-phone">Add Phone Number</button>
                                    @error('phone_nos')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Addresses</label>
                                    <div id="address-fields">
                                        @foreach ($contact->addresses as $index => $address)
                                            <div class="input-group mb-2">
                                                <input type="text" name="addresses[]" class="form-control @error('addresses.' . $index) is-invalid @enderror" value="{{ $address }}" placeholder="Enter address">
                                                <button type="button" class="btn btn-danger remove-address">Remove</button>
                                                @error('addresses.' . $index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                        @if (empty($contact->addresses))
                                            <div class="input-group mb-2">
                                                <input type="text" name="addresses[]" class="form-control" placeholder="Enter address">
                                                <button type="button" class="btn btn-danger remove-address">Remove</button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-success mt-2" id="add-address">Add Address</button>
                                    @error('addresses')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('contact_details.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('add-phone').addEventListener('click', function() {
    const phoneFields = document.getElementById('phone-fields');
    const newField = document.createElement('div');
    newField.classList.add('input-group', 'mb-2');
    newField.innerHTML = `
        <input  name="phone_nos[]" class="form-control" placeholder="Enter phone number">
        <button type="button" class="btn btn-danger remove-phone">Remove</button>
    `;
    phoneFields.appendChild(newField);
});

document.getElementById('add-address').addEventListener('click', function() {
    const addressFields = document.getElementById('address-fields');
    const newField = document.createElement('div');
    newField.classList.add('input-group', 'mb-2');
    newField.innerHTML = `
        <input type="text" name="addresses[]" class="form-control" placeholder="Enter address">
        <button type="button" class="btn btn-danger remove-address">Remove</button>
    `;
    addressFields.appendChild(newField);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-phone') || e.target.classList.contains('remove-address')) {
        const parentFields = e.target.closest('#phone-fields') || e.target.closest('#address-fields');
        if (parentFields.children.length > 1) {
            e.target.closest('.input-group').remove();
        }
    }
});
</script>
@endsection