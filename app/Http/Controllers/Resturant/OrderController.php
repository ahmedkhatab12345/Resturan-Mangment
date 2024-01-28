<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\Customer;
use App\Models\ItemOrder;

class OrderController extends Controller
{
    public function index()
    {
        $menuItems = Item::all();
        return view('resturant.orders.index', compact('menuItems'));
    }

    public function store(Request $request)
    {
         // Validate the request data
         $request->validate([
            'customer_name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.item_id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.total_price' => 'required|numeric|min:0',
        ]);

        // Create a new order
        $order = Order::create([
            'customer_name' => $request->input('customer_name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'notes' => $request->input('notes'),
            // You may need to adjust the fields above based on your actual database schema
        ]);

        // Attach items to the order
        $order->items()->createMany($request->input('items'));

        // Redirect or return a response as needed
        return redirect()->route('some.route'); // Replace 'some.route' with the actual route you want to redirect to
    }


}
