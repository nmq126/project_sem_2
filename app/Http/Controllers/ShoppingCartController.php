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
                'msg' => 'So luong san pham phai lon hon 0'
            ]);
        }
        $obj = Product::find($productId);
        if ($obj == null) {
            return view('client.errors.404', [
                'msg' => 'Khong tim thay san pham'
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
        }else{
            $cartItem = new stdClass();
            $cartItem->id = $obj->id;
            $cartItem->name = $obj->name;
            $cartItem->unitPrice = $obj->price;
            $cartItem->quantity = $productQuantity;
            $shoppingCart[$productId] = $cartItem;
        }
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }

    public function remove(Request $request)
    {
        $productId = $request->get('id');
        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        unset($shoppingCart[$productId]);
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }

    public function update(Request $request)
    {
        $productId = $request->get('id');
        $productQuantity = $request->get('quantity');
        //kiem tra sp ton tai, sp con ban k, sp con du so luong k
        if ($productQuantity <= 0) {
            return view('client.errors.404', [
                'msg' => 'So luong san pham phai lon hon 0'
            ]);
        }
        $obj = Product::find($productId);
        if ($obj == null) {
            return view('client.errors.404', [
                'msg' => 'Khong tim thay san pham'
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
        return redirect('/cart/show');
    }
}
