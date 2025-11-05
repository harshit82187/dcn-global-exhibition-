@extends('admin.layouts.app')

@section('admin-content')
    <div class="main-content demo">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>@lang('Contact Us List')</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-centered table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('Name')</th>
                                            <th>@lang('Email')</th>
                                            <th>@lang('Phone')</th>
                                            <th>@lang('Subject')</th>
                                            <th>@lang('Message')</th>
                                            <th>@lang('Created At')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contactList as $contact)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->subject }}</td>
                                                <td>{{ Str::limit($contact->message, 50) }}</td>
                                                <td>{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                                                <td>
                                                    @if($contact->repliedEmail)
                                                        <button type="button" class="btn btn-success btn-sm view-reply-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#viewReplyModal{{ $contact->id }}">@lang('Replied')</button>
                                                    @else
                                                        <button type="button" class="btn btn-primary btn-sm reply-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#replyModal{{ $contact->id }}">@lang('Reply')</button>
                                                    @endif
                                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('@lang('Are you sure you want to delete this contact?')')">@lang('Delete')</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Reply Modal -->
                                            <div class="modal fade" id="replyModal{{ $contact->id }}" tabindex="-1"
                                                 aria-labelledby="replyModalLabel{{ $contact->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="replyModalLabel{{ $contact->id }}">@lang('Reply to') {{ $contact->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="replyForm{{ $contact->id }}" action="{{ route('contacts.reply', $contact->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="recipient-email{{ $contact->id }}" class="form-label">@lang('To')</label>
                                                                    <input type="email" class="form-control" id="recipient-email{{ $contact->id }}"
                                                                           value="{{ $contact->email }}" readonly>
                                                                </div>
                                                                <input name="contact_id" value="{{ $contact->id }}" hidden>
                                                                <div class="mb-3">
                                                                    <label for="subject{{ $contact->id }}" class="form-label">@lang('Subject')</label>
                                                                    <input type="text" class="form-control" id="subject{{ $contact->id }}"
                                                                           name="subject" value="Re: {{ $contact->subject }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message{{ $contact->id }}" class="form-label">@lang('Message')</label>
                                                                    <textarea class="form-control" id="message{{ $contact->id }}"
                                                                              name="message" rows="6" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                                                                <button type="submit" class="btn btn-primary">@lang('Send Reply')</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- View Reply Modal -->
                                            <div class="modal fade" id="viewReplyModal{{ $contact->id }}" tabindex="-1"
                                                 aria-labelledby="viewReplyModalLabel{{ $contact->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewReplyModalLabel{{ $contact->id }}">@lang('Reply Details for') {{ $contact->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if($contact->repliedEmail)
                                                                <p><strong>@lang('Subject'):</strong> {{ $contact->repliedEmail->subject }}</p>
                                                                <p><strong>@lang('Message'):</strong> {{ $contact->repliedEmail->message }}</p>
                                                                <p><strong>@lang('Sent At'):</strong> {{ $contact->repliedEmail->created_at->format('d M Y, h:i A') }}</p>
                                                            @else
                                                                <p>@lang('No reply details available.')</p>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $contactList->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- jQuery -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap JS (includes Popper.js for modals) -->
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script>
            $(document).ready(function () {
    // Debugging: Log to confirm jQuery and Bootstrap are loaded
    console.log('jQuery version:', $.fn.jquery);
    console.log('Bootstrap Modal available:', typeof $.fn.modal !== 'undefined');

    // Handle reply form submission
    $('form[id^="replyForm"]').on('submit', function (e) {
        e.preventDefault();
        const form = $(this);
        const contactId = form.attr('id').replace('replyForm', '');
        const url = form.attr('action');
        const data = form.serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json', // Explicitly expect JSON response
            success: function (response) {
                console.log('AJAX Success:', response); // Debug log
                if (response.success) {
                    // Close the reply modal
                    $('#replyModal' + contactId).modal('hide');

                    // Replace Reply button with Replied button
                    const repliedButton = `<button type="button" class="btn btn-success btn-sm view-reply-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewReplyModal${contactId}">@lang('Replied')</button>`;
                    form.closest('tr').find('.reply-btn').replaceWith(repliedButton);

                    // Show success toast
                    showToast(response.message || '@lang("Reply sent successfully!")');
                } else {
                    showToast(response.message || '@lang("Error sending reply.")', 'error');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', {
                    status: xhr.status,
                    statusText: xhr.statusText,
                    responseText: xhr.responseText,
                    error: error
                });
                // Try to extract message from JSON response, if available
                let message = '@lang("Failed to send reply. Please try again.")';
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        message = response.message;
                    }
                } catch (e) {
                    // Non-JSON response, use default message
                }
                showToast(message, 'error');
            }
        });
    });

    // Custom toast notification
    function showToast(message, type = 'success') {
        const toast = $('<div>').css({
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '15px',
            color: '#fff',
            background: type === 'success' ? '#28a745' : '#dc3545',
            borderRadius: '5px',
            zIndex: 1000,
            maxWidth: '300px',
            boxShadow: '0 4px 8px rgba(0,0,0,0.2)'
        }).text(message);

        $('body').append(toast);
        setTimeout(function () {
            toast.fadeOut(300, function () {
                $(this).remove();
            });
        }, 3000);
    }

    // Debugging: Test modal opening manually
    $('.reply-btn, .view-reply-btn').on('click', function () {
        const target = $(this).data('bs-target');
        console.log('Attempting to open modal:', target);
        $(target).modal('show'); // Manually trigger modal
    });
});
        </script>
@endsection