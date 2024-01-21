<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    public function index(){
        return view('resturant.index');
    }
}
