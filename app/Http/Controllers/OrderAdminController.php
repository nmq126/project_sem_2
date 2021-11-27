<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderAdminController extends Controller
{
    public function getOrdersList()
    {
        return view('admin.orders.orders');
    }

    public function fetchOrders()
    {
        $orders = Order::all();
        $ordersSuccess = $orders->where('status', '=', 2);
        $total = 0;
        foreach ($ordersSuccess as $order) {
            $total += $order->total_price;
        }
        return view('admin.orders.orders', compact('orders', 'total'));
    }

    public function search(Request $request)
    {
        switch ($request->input('status')) {
            case 'Success':
                $status = 2;
                break;
            case 'Waiting':
                $status = 1;
                break;
            case 'Failed':
                $status = 0;
                break;
            default:
                $status = -1;
                break;
        }
        $startDate = $request->input('start-date');

        $endDate = $request->input('end-date');

        if ($status == -1) {
            if ($startDate != '' && $endDate != '') {
                $orders = DB::table('orders')->select()
                    ->where('created_at', '>=', $startDate)
                    ->where('created_at', '<=', $endDate)->get();
            } elseif ($startDate != '') {
                $orders = DB::table('orders')->select()
                    ->where('created_at', '<=', $startDate)->get();
            } elseif ($endDate != '') {
                $orders = DB::table('orders')->select()
                    ->where('created_at', '<=', $endDate)->get();
            } else {
                $orders = Order::all();
            }
        } else {
            if ($startDate != '' && $endDate != '') {
                $orders = DB::table('orders')->select()
                    ->where('created_at', '>=', $startDate)
                    ->where('created_at', '<=', $endDate)
                    ->where('status', '=', $status)->get();
            } elseif ($startDate != '') {
                $orders = DB::table('orders')->select()
                    ->where('created_at', '<=', $startDate)
                    ->where('status', '=', $status)->get();
            } elseif ($endDate != '') {
                $orders = DB::table('orders')->select()
                    ->where('created_at', '<=', $endDate)
                    ->where('status', '=', $status)->get();
            } else {
                $orders = Order::where('status', '=', $status)->get();
            }
        }
        $ordersSuccess = $orders->where('status', '=', 2);
        $total = 0;
        foreach ($ordersSuccess as $order) {
            $total += $order->total_price;
        }
        return view('admin.orders.orders', compact('orders', 'total'));
    }
}
