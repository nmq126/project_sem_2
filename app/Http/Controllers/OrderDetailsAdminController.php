<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
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
           return view('admin.orders.details', ['orders' => $orders, 'totalPrice' => $totalPrice]);
    }
}
