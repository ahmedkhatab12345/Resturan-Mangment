@extends('layouts.site.app')

@section('content')
    <div class="container">
        <h2>Booking Menu</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer_name</th>
                    <th scope="col">number_of_people </th>
                    <th scope="col"> Date & Time</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->number_of_people }}</td>
                        <td>{{ $booking->booking_datetime }}</td>
                        <td>{{ $booking->notes }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
