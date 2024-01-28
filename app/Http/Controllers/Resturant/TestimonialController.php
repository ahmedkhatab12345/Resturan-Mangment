<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class TestimonialController extends Controller
{
    public function index(){
        $reviews = Review::where('status', 'view')->get();
        return view('resturant.testimonial.index',compact('reviews'));
    }
}
