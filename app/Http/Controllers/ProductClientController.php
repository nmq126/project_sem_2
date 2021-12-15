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

    public function getProductDetail(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        return view('client.product_detail.product_detail', ['product' => $product]);
    }

    public function getList(Request $request): string
    {
        $products = Product::query()->where('status', '=', 1);
        $categories = Category::all();
        $ingredients = Ingredient::all();
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $lowerKeyword = strtolower($keyword);
            $products = $products->whereRaw('LOWER(name) LIKE ?', '%' . $lowerKeyword . '%');
        }
        if ($request->has('categories')) {
            $checkC = $_GET['categories'];
            $products = $products->whereIn('category_id', $checkC);
        }
        if ($request->has('ingredients')) {
            $checkI = $_GET['ingredients'];
            $products = $products->whereIn('ingredient_id', $checkI);
        }
        if ($request->has('from-price')) {
            $fromPrice = $request->input('from-price');
            if ($fromPrice != null)
                $products = $products->whereRaw('price - (price * discount / 100) >= ?', $fromPrice);
        }
        if ($request->has('to-price')) {
            $toPrice = $request->input('to-price');
            if ($toPrice != null)
                $products = $products->whereRaw('price - (price * discount / 100) <= ?', $toPrice);
        }
        if ($request->has('sort-by')) {
            $sort = $request->input('sort-by');
            switch ($sort) {
                case 'price':
                    $products = $products->orderByRaw('price - (price * discount / 100)');
                    break;
                case 'price_desc':
                    $products = $products->orderByRaw('price - (price * discount / 100) DESC');
                    break;
                case 'name':
                    $products = $products->orderBy('name');
                    break;
                case 'name_desc':
                    $products = $products->orderBy('name', 'desc');
                    break;
            }
        }
        $products = $products->paginate(12);
        $products->appends($request->all());
        return view('client.products', compact('products', 'categories', 'ingredients'))->render();
    }


    public function getDetail($id)
    {
        $product = Product::find($id);
        $products = Product::all();
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
        return view('client.product-details', compact('product', 'products'));
    }

    public function getRecent()
    {
        if (Session::has('recent_view')) {
            $products = Product::findMany(Session::get('recent_view'));
            return view('client.test.products', ['products' => $products]);
        }
        return view('client.errors.404', ['msg' => 'Không có sản phẩm nào xem gần đây']);
    }
}
