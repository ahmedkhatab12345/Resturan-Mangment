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
                                                <h5 class="mb-0">Booking #{{ $booking->id }}</h5>
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

    <!-- إضافة السكريبت للتفاعل مع الأزرار -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.confirm-booking-btn, .reject-booking-btn, .delete-booking-btn').on('click', function () {
                var bookingId = $(this).data('booking-id');
                var actionType = '';

                if ($(this).hasClass('confirm-booking-btn')) {
                    actionType = 'confirm';
                } else if ($(this).hasClass('reject-booking-btn')) {
                    actionType = 'reject';
                } else if ($(this).hasClass('delete-booking-btn')) {
                    actionType = 'delete';
                }

                // Perform the action based on the button clicked
                performBookingAction(bookingId, actionType);
            });
        });

        function performBookingAction(bookingId, actionType) {
            // Implement your logic here based on the action type
            // You can use AJAX to send the action to the server and update the booking status
            console.log('Booking ID:', bookingId);
            console.log('Action Type:', actionType);

            // Example AJAX request (you need to modify this based on your actual routes and logic)
            $.ajax({
                url: '/perform-booking-action/' + bookingId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    action_type: actionType
                },
                success: function (response) {
                    // Handle success response
                    console.log(response);
                },
                error: function (error) {
                    // Handle error response
                    console.log(error.responseJSON.message);
                }
            });
        }
    </script>
@endsection
