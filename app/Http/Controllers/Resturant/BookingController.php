<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(){
        return view('resturant.bookings.index');
    }

    public function getBooking(){
        $customerId = Auth::guard('customers')->id();
        $bookings = Booking::where('customer_id', $customerId)
            ->orderBy('created_at', 'desc') 
            ->take(5) 
            ->get();
        return view('resturant.bookings.getbooking', compact('bookings'));
    }
}
