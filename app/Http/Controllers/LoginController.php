<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function create()
    {
        return view('client.login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect('/home');
        } else {
            echo 'no bruv';
        }
    }

    public function showOrder(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $orders = Order::query();
            $orders = $orders->where('user_id', '=', $user_id);
            if ($request->has('keyword')) {
                $keyword = $request->input('keyword');
                $orders = $orders->where('ship_name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ship_phone', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ship_address', 'LIKE', '%' . $keyword . '%');
            }
            if ($request->has('from')) {
                $fromDate = $request->input('from');
                if ($fromDate != null) {
                    $orders = $orders->where('created_at', '>=', $fromDate);
                }
            }
            if ($request->has('to')) {
                $toDate = $request->input('to');
                if ($toDate != null) {
                    $orders = $orders->whereDate('created_at', '<=', $toDate);
                }
            }
            if ($request->has('from-price')) {
                $fromPrice = $request->input('from-price');
                if ($fromPrice != null) {
                    $orders = $orders->where('total_price', '>=', $fromPrice);
                }
            }
            if ($request->has('to-price')) {
                $toPrice = $request->input('to-price');
                if ($toPrice != null) {
                    $orders = $orders->where('total_price', '<=', $toPrice);
                }
            }
            if ($request->has('status')) {
                $status = $request->input('status');
                switch ($status) {
                    case 'paid':
                        $orders = $orders->where('checkout', '=', 1);
                        break;
                    case 'not-paid':
                        $orders = $orders->where('checkout', '=', 0);
                }
            }
            $orders = $orders->paginate(5);
            $orders->appends($request->all());
            return view('client.my-account', compact('orders'));
        } else return view('client.my-account');
    }

    public function showOrderDetails($id, Request $request)
    {
        $orders = Order::where('id', '=', $id)->first();
        $orderDetails = OrderDetail::query();
        if ($request->has('name')) {
            $name = $request->input('name');
            $products = DB::table('products')->where('name', 'LIKE', '%' . $name . '%')->get();
            if (count($products) > 0) {
                foreach ($products as $product) {
                    $productsId[] = $product->id;
                }
                if ($productsId != null) {
                    $orderDetails = $orderDetails->whereIn('product_id', $productsId);
                }
            } else $orderDetails = $orderDetails->where('order_id', '=', -1);
        }
        if ($request->has('from-price')) {
            $fromPrice = $request->input('from-price');
            if ($fromPrice != '') {
                $orderDetails = $orderDetails->whereRaw('unit_price * quantity >= ?', $fromPrice);
            }
        }
        if ($request->has('to-price')) {
            $toPrice = $request->input('to-price');
            if ($toPrice != '') {
                $orderDetails = $orderDetails->whereRaw('unit_price * quantity <= ?', $toPrice);
            }
        }
        $orderDetails = $orderDetails->paginate(5);
        return view('client.my-account-orderDetails', compact('orderDetails', 'orders'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('home');
    }
}
