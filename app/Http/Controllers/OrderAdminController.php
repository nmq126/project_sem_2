<?php

namespace App\Http\Controllers;


use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use BenSampo\Enum\Enum;
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
        $orders = Order::paginate(10);
        $ordersSuccess = $orders->where('checkout', '=', 1);
        $total = 0;
        foreach ($ordersSuccess as $order) {
            $total += $order->total_price;
        }
        $products = Product::all();

        return view('admin.orders.orders', ["orders"=>$orders,"total"=>$total,"products"=>$products]);


    }
    public function Change(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);


$status= $request->status;

        $order->status = $status;
        $order->update();
        return redirect('/admin/orders')->with("msg", "Thay đổi thành công");

    }
public function UpdateView(Request $request){
        $order = Order::find($request->id);
        return view("admin.orders.order_update",["order"=>$order]);
}
    public function UpdateOrder(Request $request){
        $order = Order::find($request->id);
        $order->ship_name = $request->ship_name;
        $order->ship_address = $request->ship_address;
        $order->ship_phone= $request->ship_phone;
        $order->checkout = $request->checkout;
        $order->status = $request->status;
        $order->ship_note =$request->ship_note;
        $order->update();
        return redirect('/admin/orders')->with("msg", "Thay đổi thành công");
    }
    public function Destroy(Request $request){
    $ids =    $request->id;
$status = OrderStatus::Cancel;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['status'=>$status]);
        }

return "Xóa Tất cả thành công ";
}
    public function Done(Request $request){
        $ids =    $request->id;
        $status = OrderStatus::Done;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['status'=>$status]);
        }

        return "Xóa Tất cả thành công ";
    }
    public function Wait(Request $request){
        $ids =    $request->id;
        $status = OrderStatus::Waiting;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['status'=>$status]);
        }

        return "Xóa Tất cả thành công ";
    }
    public function waircheckout(Request $request){
        $ids =    $request->id;
        $status = OrderStatus::WaitForCheckout;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['status'=>$status]);
        }

        return "Xóa Tất cả thành công ";
    }
    public function process(Request $request){
        $ids =    $request->id;
        $status = OrderStatus::Processing;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['status'=>$status]);
        }

        return "Xóa Tất cả thành công ";
    }
    public function deliver(Request $request){
        $ids =    $request->id;
        $status = OrderStatus::Delivering;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['status'=>$status]);
        }

        return "Xóa Tất cả thành công ";
    }
    public function checkall(Request $request){
        $ids =    $request->id;
        $checkout = 1;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['checkout'=>$checkout]);
        }

        return "Xóa Tất cả thành công ";
    }
    public function checkallnon(Request $request){
        $ids =    $request->id;
        $checkout = 0;
        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            DB::table('orders')->where([ ['id','=',$ids[$i]]])->update(['checkout'=>$checkout]);
        }

        return "Xóa Tất cả thành công ";
    }
    public function Deleteall(Request $request){
        $ids =    $request->id;

        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            Order::find($ids[$i])->delete();
        }

        return "Xóa Tất cả thành công ";
    }
public function DeleteOrder(Request $request){
    $id = $request->id;
    Order::find($id)->delete();
    return redirect('/admin/orders')->with("msg", "Xóa thành công");
}


    public function search(Request $request)
    {

    $orders = Order::query()->checkout($request)
        ->search($request)
        ->address($request)
        ->phone($request)
        ->startDate($request)
        ->endDate($request)
        ->product($request)
        ->trash($request)
        ->status($request)->paginate(10);

        $ordersSuccess = $orders->where('checkout', '=', 1);
        $total = 0;
        foreach ($ordersSuccess as $order) {
            $total += $order->total_price;
        }
        $products = Product::all();
        return view('admin.orders.orders', ["orders"=>$orders,"total"=>$total,"products"=>$products]);


    }
    public function export()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }
}
