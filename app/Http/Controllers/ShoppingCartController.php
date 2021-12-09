<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use stdClass;

class ShoppingCartController extends Controller
{
    public function show()
    {
        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        return view('client.cart', [
            'shoppingCart' => $shoppingCart
        ]);
    }

    public function add(Request $request)
    {
        $productId = $request->get('id');
        $productQuantity = $request->get('quantity');
        //kiem tra sp ton tai, sp con ban k, sp con du so luong k
        if ($productQuantity <= 0) {
            return view('client.errors.404', [
                'msg' => 'Số lượng sản phẩm phải lớn hơn 0'
            ]);
        }
        $obj = Product::find($productId);
        if ($obj == null || $obj->status == 0) {
            return view('client.errors.404', [
                'msg' => 'Không tìm thấy sản phẩm'
            ]);
        }
        //
        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        //
        if (array_key_exists($productId, $shoppingCart)) {
            $existingCartItem = $shoppingCart[$productId];
            $existingCartItem->quantity += $productQuantity;
            $shoppingCart[$productId] = $existingCartItem;
        } else {
            $cartItem = new stdClass();
            $cartItem->id = $obj->id;
            $cartItem->thumbnail = $obj->thumbnail;
            $cartItem->name = $obj->name;
            $cartItem->price = $obj->price;
            $cartItem->unitPrice = $obj->price * (100 - $obj->discount) / 100;
            $cartItem->quantity = $productQuantity;
            $shoppingCart[$productId] = $cartItem;
        }
        Session::put('shoppingCart', $shoppingCart);
        return Session::get('shoppingCart');

    }

    public function remove(Request $request)
    {
        $productId = $request->get('id');
        if ($productId != 'all') {
            $shoppingCart = [];
            if (Session::has('shoppingCart')) {
                $shoppingCart = Session::get('shoppingCart');
            }
            unset($shoppingCart[$productId]);
            Session::put('shoppingCart', $shoppingCart);
        }
        else {
            Session::flush();
        }
        return redirect('/cart');
    }

    public function update(Request $request)
    {
        $productId = $request->get('id');
        $productQuantity = $request->get('quantity');
        //kiem tra sp ton tai, sp con ban k, sp con du so luong k
        if ($productQuantity <= 0) {
            return view('client.errors.404', [
                'msg' => 'Số lượng sản phẩm phải lớn hơn 0'
            ]);
        }
        $obj = Product::find($productId);
        if ($obj == null || $obj->status == 0) {
            return view('client.errors.404', [
                'msg' => 'Không tìm thấy sản phẩm'
            ]);
        }
        //
        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        //
        if (array_key_exists($productId, $shoppingCart)) {
            $existingCartItem = $shoppingCart[$productId];
            $existingCartItem->quantity = $productQuantity;
            $shoppingCart[$productId] = $existingCartItem;
        }
        Session::put('shoppingCart', $shoppingCart);
        return Session::get('shoppingCart');
    }
}
