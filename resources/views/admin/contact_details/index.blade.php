@extends('admin.layouts.app')

@section('admin-content')
<div class="main-content demo">
    <section class="section">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>@lang('Contact/Address List')</h4>
                    </div>
                    <div class="card-body">
                        @if ($contacts->isEmpty())
                            <p>No contact details found.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Phone Numbers</th>
                                        <th>Addresses</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->contact_id }}</td>
                                            <td>{{ implode(', ', $contact->phone_nos) }}</td>
                                            <td>{{ implode(', ', $contact->addresses) ?: 'None' }}</td>
                                            <td>
                                                <a href="{{ route('contact_details.edit', $contact->contact_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </section>
</div> <!-- end main-content -->
@endsection
