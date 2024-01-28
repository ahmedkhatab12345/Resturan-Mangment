@extends('layouts.dashboard.app')

@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">All Bookings</h3>
                    </div>
                    <div class="card-body">
                        @if($bookings->count() > 0)
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($bookings as $booking)
                                    <div class="col">
                                        <div class="card h-100 border-primary bg-light">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Booking #{{ $booking->id }} _ {{ $booking->status }}</h5>

                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong class="text-primary">Customer Name:</strong> {{ optional($booking->customer)->name }}</li>
                                                    <li class="list-group-item"><strong class="text-info">Number of People:</strong> {{ $booking->number_of_people }}</li>
                                                    <li class="list-group-item"><strong class="text-success">Booking Date:</strong> {{ $booking->booking_datetime }}</li>
                                                    <li class="list-group-item"><strong class="text-muted">Notes:</strong> {{ $booking->notes }}</li>
                                                </ul>
                                            </div>
                                            <!-- Add your update form or any other actions here -->
                                            <div class="card-footer bg-light">
                                            <button type="button" class="btn btn-success confirm-booking-btn" data-booking-id="{{ $booking->id }}">Confirm</button>
                                            <button type="button" class="btn btn-warning reject-booking-btn" data-booking-id="{{ $booking->id }}">Reject</button>
                                            <button type="button" class="btn btn-danger delete-booking-btn" data-booking-id="{{ $booking->id }}">Delete</button>
                                            </div>
                                                <!-- Success Toast -->
                                                <div class="position-absolute bottom-0 start-50 translate-middle-x p-3">
                                                    <div id="success-toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                                                        <div class="toast-header bg-success text-white">
                                                            <strong class="me-auto">Success</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                        </div>
                                                        <div class="toast-body">
                                                            Booking status updated successfully!
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">No bookings available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    // تحديث حالة الحجز باستخدام Ajax
    $('.confirm-booking-btn, .reject-booking-btn, .delete-booking-btn').on('click', function () {
        var bookingId = $(this).data('booking-id');
        var status = '';

        if ($(this).hasClass('confirm-booking-btn')) {
            status = 'confirm';
        } else if ($(this).hasClass('reject-booking-btn')) {
            status = 'reject';
        } else if ($(this).hasClass('delete-booking-btn')) {
            status = 'delete';
        }
        

        updateBookingStatus(bookingId, status);
    });

    function updateBookingStatus(bookingId, status) {
        // استخدام متغير global للحصول على قيمة رمز CSRF من الصفحة
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '/bookings/' + bookingId + '/' + status,
            dataType: 'json',
            data: {
                _token: csrfToken  // إضافة رمز CSRF إلى البيانات المرسلة
            },
            success: function (response) {
                // قم بتحديث واجهة المستخدم أو إجراء أي إجراء آخر بناءً على الاستجابة
                console.log(response.message);

                // عرض رسالة النجاح باستخدام Bootstrap Toast
                $('#success-toast').toast('show');

                // إعادة تحميل الصفحة لتحديث قائمة الحجوزات بشكل ديناميكي
                location.reload();
            },
            error: function (error) {
                console.error('Error updating booking status: ', error);
            }
        });
    }
</script>

@endsection