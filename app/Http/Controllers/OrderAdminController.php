<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
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
        $orders = DB::table('orders')->get();
        $ordersSuccess = $orders->where('status', '=', 2);
        $total = 0;
        foreach ($ordersSuccess as $order) {
            $total += $order->total_price;
        }
        return view('admin.orders.orders', compact('orders', 'total'));


    }
    public function fetchOrdersJson()
    {
        $orders = DB::table('orders')->get();
        $ordersSuccess = $orders->where('status', '=', 2);
        $total = 0;
        foreach ($ordersSuccess as $order) {
            $total += $order->total_price;
        }
        return $orders;


    }
    public function JsonSearch(Request $request){
        $key = $request->keyword;
        $query = DB::table('orders')->where('id','=', $key)
            ->orWhere('ship_name','like', '%' . $key . '%')
            ->orWhere('ship_phone','like', '%' . $key . '%')
            ->orWhere('ship_address','like', '%' . $key . '%')
            ->orWhere('total_price','like', '%' . $key . '%')->get();
        return $query;
    }
    public function Destroy(Request $request){
    $ids =    $request->id;

        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where('id', $ids[$i])->delete();


        }

return "Xóa Tất cả thành công ";
}
public function DeleteOrder(Request $request){
    $id = $request->id;
    DB::table('orders')->where('id', $id)->delete();

    return redirect('/admin/orders')->with("msg", "Xóa thành công");
}
    public function search(Request $request)
    {
      $status=$request->status;

        $startDate = $request->start_date;

        $endDate = $request->end_date;

        if ($status == OrderStatus::All) {
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
        return  $orders ;
    }
}
