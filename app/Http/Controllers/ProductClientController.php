<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductClientController extends Controller
{
    public function getList(Request $request): string
    {
        $products = Product::paginate(3);
        $categories = Category::all();
        $ingredients = Ingredient::all();
        if ($request->ajax()) {
            return view('client.products', compact('products', 'categories', 'ingredients'))->render();
        }
        return view('client.products', compact('products', 'categories', 'ingredients'))->render();
    }


    public function getDetail($id)
    {
        $product = Product::find($id);
        $array = [];
        if (Session::has('recent_view')) {
            $array = Session::get('recent_view');
        }
        if (!in_array($id, $array)) {
            if (sizeof($array) >= 5) {
                array_shift($array);
            }
            array_push($array, $id);
        }
        Session::put('recent_view', $array);
        return view('client.test.detail', ['product' => $product]);
    }

    public function getRecent()
    {
        if (Session::has('recent_view')) {
            $products = Product::findMany(Session::get('recent_view'));
            return view('client.test.products', ['products' => $products]);
        }
        return view('client.errors.404', ['msg' => 'Không có sản phẩm nào xem gần đây']);
    }


    public function search(Request $request): JsonResponse
    {
        $categoryId = $request->input('categories');
        $ingredientId = $request->input('ingredients');
        $fromPrice = $request->input('fromPrice');
        $toPrice = $request->input('toPrice');
        $sorted = $request->input('sort');
        $products = Product::query();
        if ($categoryId != []) {
            $products->whereIn('category_id', $categoryId);
        }
        if ($ingredientId != []) {
            $products->whereIn('ingredient_id', $ingredientId);
        }
        if ($fromPrice != '') {
            $products->whereRaw('(price - (price * discount / 100)) >= ?', $fromPrice);
        }
        if ($toPrice != '') {
            $products->whereRaw('(price - (price * discount / 100)) <= ?', $toPrice);
        }
        switch ($sorted) {
            case 'item-price':
                $products->orderBy('price');
                break;
            case 'price-item':
                $products->orderBy('price', 'desc');
                break;
            case 'item-name':
                $products->orderBy('name');
                break;
            case 'name-item':
                $products->orderBy('name', 'desc');
                break;
        }
            $products = $products->get();
        return response()->json([
            'products' => $products
        ]);
    }
}
