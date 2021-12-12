<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAdminController extends Controller
{
    public function viewUserAdmin(){
        $user = User::paginate(10);
        return view("admin.user.user",["users"=>$user]);
    }
    public function FliterUserAdmin(Request $request){
        $user = User::query()->search($request)
            ->status($request)
            ->trash($request)
            ->level($request)
            ->paginate(10);
        return view("admin.user.user",["users"=>$user]);

    }
    public function DeleteUserAdmin(Request $request){
        $user = User::find($request->id);
$user->delete();
        return view("admin.user.user",["users"=>$user]);

    }
    public function UpdateUserAdmin(Request $request){

//if ($request->has("level")){
//    DB::table('users')
//        ->where('id',  $request->id)
//        ->update(['level' =>$request->level]);
//}
//if ($request->has("status")){
//    DB::table('users')
//        ->where('id',  $request->id)
//        ->update(['status' =>$request->status]);
//}
//
//
//        return redirect('/admin/user/list');
        return $request->all();



    }
}
