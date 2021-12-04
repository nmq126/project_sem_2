<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{

    public function create(){
        if (!strcmp(URL::previous(), 'http://127.0.0.1:8000/login') ){
            Session::put('link', url()->previous());
        }
        return view('client.login');
    }

    public function store(Request $request){
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
                return redirect(Session::get('link'));
        }else{
            return back()->with('error', 'Thông tin đăng nhập chưa chính xác!');
        }
    }

    public function destroy(){
        Auth::logout();
        return redirect('/login');
    }
}
