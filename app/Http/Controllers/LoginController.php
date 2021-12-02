<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('client.login');
    }

    public function  store(Request $request){
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            return redirect('/home');
        }else{
            echo 'no bruv';
        }
    }

    public function destroy(){
        Auth::logout();
    }
}
