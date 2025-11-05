@extends('website.layouts.app')
@section('title', 'Get A Quote - DCN Global Exhibition')
@section('content')
<section>
    <div class="container py-5 Quote">
        <form id="quote-store" action="{{ route('quote-store') }}" method="POST">
            @csrf
            <div class="step-box active" id="step1">
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label">What do you need? <span class="text-danger">*</span></label>
                        <input type="text" name="type" class="form-control" value="Stand" required autocomplete="one-time-code">

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Where do you need it?<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="city" placeholder="Enter city" required  autocomplete="one-time-code">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Event Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="event_name" placeholder="Enter event name" required autocomplete="one-time-code">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Event Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control fs-4" name="event_date" id="event_date" placeholder="Select event date" required  autocomplete="one-time-code">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stand size<span class="text-danger">*</span></label>
                        <div class="input-group flex-nowrap gap-1">
                            <input type="number" class="form-control mb-0" name="stand_size" value="0" required autocomplete="one-time-code">
                            <span class="input-group-text">m²</span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <a class="rts-btn btn-primary border-0" style="cursor:pointer;" onclick="nextStep(3)">Next »</a>
                    </div>
                </div>
            </div>
            <div class="step-box" id="step3">
                <h5 class="text-dark">Your contact information</h5>
                <div class="row g-3">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your name" required  autocomplete="one-time-code">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your email" required autocomplete="one-time-code">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control number" name="mobile_no" placeholder="Enter Your phone number" required autocomplete="one-time-code">
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control fs-4" rows="4" name="comment" placeholder="Enter Additional comments" required autocomplete="one-time-code"></textarea>
                    </div>
                    <div class="col-md-2 text-end me-3">
                        <button type="submit" class="rts-btn btn-primary border-0">Submit</button>
                    </div>
                    <div class="col-md-2 text-end">
                        <a class="btn btn-outline-secondary btn-height w-100" onclick="prevStep(1)">« Back</a>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</section>
@endsection
@push('js')
<script>
    $(document).on('submit', '#quote-store', function() {
        let btn = $('button[type="submit"]');
        btn.html('<span class="spinner-border spinner-border-sm"></span> Please Wait...').prop('disabled', true).css('cursor', 'no-drop');
    });
    var today = new Date().toISOString().split('T')[0];
    $('#event_date').attr('min', today);
    $(".number").on("input", function () {
        this.value = this.value.replace(/[^0-9]/g, '');
         if (this.value.length > 10) {
          this.value = this.value.slice(0, 10); 
      }
    });

</script>
@endpush