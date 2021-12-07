<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function show(){
//
        $discountProducts = Product::all()->where('discount', '>', 0)->random(3);
        $categories = Category::all();
        $blog = Blog::paginate(3);
        return view('client.home', [
            'categories' => $categories,
            'discountProducts' => $discountProducts,
            'blogs'=>$blog
        ]);
    }
}
