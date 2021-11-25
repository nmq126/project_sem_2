<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function show(){

        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        return view('client.checkout', [
            'shoppingCart' => $shoppingCart
        ]);    }

    public function process(Request $request){
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }

        if (!Session::has('shoppingCart') || sizeof($shoppingCart) == 0){
            return view('client.errors.404', [
                'msg' => 'Không có sản phẩm nào trong giỏ hàng!!'
            ]);
        }
        $shipName = $request->get('shipName');
        $shipAddress = $request->get('shipAddress');
        $shipPhone = $request->get('shipPhone');
        $shipNote = $request->get('shipNote');

        //tạo thông tin order
        $order = new Order();
        $order->ship_name = $shipName;
        $order->ship_address = $shipAddress;
        $order->ship_phone = $shipPhone;
        $order->ship_note = $shipNote;
        $order->checkout = false;

        //tạo thông tin order detail
        $hasError = false;
        $array_order_detail = [];
        foreach ($shoppingCart as $cartItem){
            $product = Product::find($cartItem->id);
            if ($product == null || $product->status == 0){
                $hasError = true;
                break;
            }
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $product->id;
            $orderDetail->order_id = $product->id;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->unit_price = $product->price * (100 - $product->discount)/100;
            $order->total_price += $orderDetail->unit_price;
            array_push($array_order_detail, $orderDetail);
        }
        if ($hasError){
            return view('client.errors.404', [
                'msg' => 'Sản phẩm không tồn tại hoặc không khả dụng!!'
            ]);
        }
        //save order, order detail vao database
        try {
            DB::beginTransaction();
            $order->save();
            $order_details = [];
            foreach ($array_order_detail as $orderDetail){
                $orderDetail->order_id = $order->id;
                $order_details = [
                    'product_id' =>$orderDetail->product_id,
                    'quantity' => $orderDetail->quantity,
                    'unit_price' => $orderDetail->unit_price,
                    'order_id' => $order->id
                ];
//                $orderDetail->save();
            }
            OrderDetail::insert($order_details);
            DB::commit();
            Session::forget('shoppingCart');
        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }
        return $array_order_detail;
    }
}
