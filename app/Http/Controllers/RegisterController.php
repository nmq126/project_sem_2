<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create(){
        return view('client.register');
    }

    public function store(RegisterRequest $request){
        $user = new User();
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->setPasswordAttribute($request->get('password'));

        $profile = new Profile();

        try {
            DB::beginTransaction();
            $user->save();

            $profile->user_id = $user->id;

            $profile->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
        return redirect('/login')->with('msg', 'Đăng ký thành công!!');
    }


}
