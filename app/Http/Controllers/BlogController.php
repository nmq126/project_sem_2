<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function getBlog(Request $request)
    {
        $blog = Blog::query();
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $blog = $blog->where('title', 'LIKE', '%' . $keyword . '%');
        }
        $blog = $blog->paginate(4);
        $blog->appends($request->all());
        return view("client.blog", ["blogs" => $blog]);
    }

    public function getBlogDetail($id)
    {
        $blogs = Blog::all();
        $blog = Blog::find($id);
        return view("client.blog-details", compact('blog', 'blogs'));
    }
}
