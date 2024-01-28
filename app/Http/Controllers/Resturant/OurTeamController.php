<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class OurTeamController extends Controller
{
    public function index(){
        $employees = Employee::where('position', 'chef')->get();
        return view('resturant.ourTeam.index',compact('employees'));
    }
}
