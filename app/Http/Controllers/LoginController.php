<?php

namespace App\Http\Controllers;


use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{

    public function redirectPath()
    {
        if (Auth::user()->level == 1) {
            return redirect('/admin/orders');
        }
    }

    public function create()
    {
        if (!strcmp(URL::previous(), 'http://127.0.0.1:8000/login')) {
            Session::put('link', URL::previous());
        }
        return view('client.login');
    }


    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
//            if (Session::get('link') != null) {
//                return redirect(Session::get('link'));
//            }
            $user = Auth::user();
            $user->update(['device_token' => $request->get('device_token')]);
            if ($user->level == 1){
                return redirect('/admin/dashboard');
            }
            return redirect('/home');

        } else {
            return back()->with('error', 'Thông tin đăng nhập chưa chính xác!');
        }

    }

    public function showOrder(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $orders = Order::query();
            $orders = $orders->where('user_id', '=', $user_id)->orderByDesc('id');
            $name = $request->input('name');
            $orders = $orders->where('ship_name', 'LIKE', '%' . $name . '%');
            if ($request->has('fromDate')) {
                $orders = $orders->startDate($request);
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
            $orders = $orders->appends($request->all());
            return view('client.my-account', compact('orders'));
        } else return view('client.my-account');
    }

    public function showOrderDetails($id, Request $request)
    {
        $order = Order::find($id);
        if ($order == null || $order->user_id != auth()->id()) {
            return view('client.errors.404', [
                'msg' => 'Đơn hàng không tồn tại!!'
            ]);
        }
        $orders = Order::where('id', '=', $id)->first();
        Notification::where('order_id', $orders->id)->update(['read_at' => Carbon::now()]);
        $orderDetails = OrderDetail::query();
        $orderDetails = $orderDetails->where('order_id', '=', $id);
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

    public function showUpdateUser(){
        return view('client.change-user-information');
    }

    public function processUpdateUser(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        Profile::where('user_id', '=', Auth::id())->update($data);
        return redirect('/my-account')->with('success', 'Thông tin tài khoản của bạn đã được cập nhật.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
