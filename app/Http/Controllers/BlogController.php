<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
 public  function getBlog(){
     $blog = Blog::paginate(6);

     return view("client.blog",["blogs"=>$blog]);
 }
 public function  JsonBlog(){
     $data = Blog::search()->get();
     return $data;
 }
 public  function getBlogDetail(Request $request){
    $id= $request->id;

    $blog = Blog::find($id);

     $blog->created= \Carbon\Carbon::now()->format("d-m-Y");

     return view("client.blog.blog_detail",["blog"=>$blog]);

 }
}
