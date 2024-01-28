<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::all();
        return view('dashboard.reviews.index',compact('reviews'));
    }

    public function store(Request $request)
    {
        try {
            //fetch data
            $reviews = $request->all();
            //store data
            $customerId = Auth::guard('customers')->id();
            $reviews = Review::create([              
                'review'=> $reviews['review'],
                'customer_id' => $customerId,
            ]);
            return redirect()->route('resturant.index')->with('success', 'Review Sent successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error Sending Review: ' . $e->getMessage())->withInput();
            }
    }

    public function destroy($id){
        $reviews = Review::destroy($id);

        if ($reviews) {
            return redirect()->route('reviews.index')->with('success', 'review deleted successfully');
        } else {
            return redirect()->route('reviews.index')->with('error', 'review not found');
        }
    }

    public function updateReviewStatus($id, Request $request)
    {
        $review = Review::find($id);

        // تحديث حالة الريفيو
        $review->status = $request->new_status;
        $review->save();

        return response()->json(['message' => 'Review status updated successfully.']);
    }
}
