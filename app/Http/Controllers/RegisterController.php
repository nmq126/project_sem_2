<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('client.register');
    }

    public function store(Request $request){
        $user = new User();
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = bcrypt($request->get('password'));

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
//        $user->save();
        return redirect('/login');
    }


}
