<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Review;
use App\Models\Menu;
class ResturantController extends Controller
{
    public function index(){
        $employees = Employee::where('position', 'chef')->get();
        $reviews = Review::where('status', 'view')->get(); 
        $menus = Menu::all();
        return view('resturant.index',compact('employees','reviews','menus'));
    }
}
