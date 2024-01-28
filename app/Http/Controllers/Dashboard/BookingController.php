<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    
    public function index()
    {
        $bookings = Booking::orderBy('booking_datetime', 'ASC')->get();
        return view('dashboard.booking.index',compact('bookings'));
    }

    public function store(Request $request)
    {
            //fetch data
            $bookings = $request->all();
            //store data
            $customerId = Auth::guard('customers')->id();
            $bookingDateTime = \Carbon\Carbon::createFromFormat('m/d/Y g:i A', $request->input('booking_datetime'))->format('Y-m-d H:i:s');
            $bookings = Booking::create([              
                'customer_name'=> $bookings['customer_name'],
                'number_of_people'=> $bookings['number_of_people'],
                'booking_datetime' => $bookingDateTime,
                'notes'=> $bookings['notes'],
                'customer_id' => $customerId,
            ]);
            return redirect()->route('resturant.index')->with('success', 'bookingDate sent successfully , please check your status of bookings.');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirmBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'confirmed']); // تحديد الحقل بشكل صريح

        return response()->json(['message' => 'Booking confirmed successfully']);
    }

    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'rejected']); // تحديد الحقل بشكل صريح

        return response()->json(['message' => 'Booking rejected successfully']);
    }
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'delete';
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }

  
}
