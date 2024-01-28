<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Menu;

class MenuResturantController extends Controller
{
    public function index(){
        $items = Item::all();
        $menus = Menu::all();
        return view('resturant.menus.index',compact('items','menus'));
    }
}
