<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{

    public function redirectPath(){
        if (Auth::user()->level == 1){
            return redirect('/admin/orders');
        }
    }

    public function create(){
        if (!strcmp(URL::previous(), 'http://127.0.0.1:8000/login') ){
            Session::put('link', URL::previous());
        }
        return view('client.login');
    }

    public function store(Request $request){
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
//            if (Session::get('link') != null) {
//                return redirect(Session::get('link'));
//            }
            $user = Auth::user();
            $user->update(['device_token'=>$request->get('device_token')]);
            $noti = new Notification();
            $noti->user_id = $user->id;
            if ($noti->save()){
                $body = 'Tài khoản ' . $user->email . ' đăng nhập vào hệ thống';
                $noti->toMultiDevice(User::all(), 'Dang nhap thanh cong', $body, null, null);
            }
            return back();
//            return redirect('/home');
        }else{
            return back()->with('error', 'Thông tin đăng nhập chưa chính xác!');
        }
    }

    public function destroy(){
        Auth::logout();
        return redirect('/login');
    }
}
