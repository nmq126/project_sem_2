<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductClientController extends Controller
{
    public function getList()
    {
        $products = Product::all();
        return view('client.test.products', ['products' =>  $products]);
    }

    public function getDetail($id)
    {
        $product = Product::find($id);
        $array = [];
        if (Session::has('recent_view')){
            $array = Session::get('recent_view');
        }
        if (!in_array($id, $array)){
            if (sizeof($array) >= 5){
                array_shift($array);
            }
            array_push($array, $id);
        }
        Session::put('recent_view', $array);
        return view('client.test.detail', ['product' =>  $product]);
    }

    public function getRecent()
    {
        if (Session::has('recent_view')){
            $products = Product::findMany(Session::get('recent_view'));
            return view('client.test.products', ['products' =>  $products]);
        }
        return view('client.errors.404', ['msg' => 'Không có sản phẩm nào xem gần đây']);
    }
}
