<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\OrderStatusUpdated;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders.index',compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    public function update(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->input('order_status')]);

        return response()->json(['message' => 'Order status updated successfully']);
    }
}
