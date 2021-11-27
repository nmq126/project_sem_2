<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderDetailsAdminController extends Controller
{
    public function orderDetail($ordersID)
    {
        $orders = Order::find($ordersID);
        $totalPrice = 0;
        foreach ($orders->orderDetails as $orderDetail) {
            $totalPrice += ($orderDetail->unit_price * $orderDetail->quantity);
        }
        return view('admin.orders.details', compact('orders', 'totalPrice'));
    }

    public function updateStatus(Request $request, $id): JsonResponse
    {
        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->update();
        return response()->json([
            'status' => 200,
            'message' => 'Update Success!'
        ]);
    }
}
