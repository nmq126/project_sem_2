<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function show(){
//
        $discountProducts = Product::all()->where('discount', '>', 0)->random(4);
        $categories = Category::all();
        return view('client.home', [
            'categories' => $categories,
            'discountProducts' => $discountProducts
        ]);
    }
}
