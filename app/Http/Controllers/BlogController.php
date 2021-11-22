<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
 public  function getBlog(){
     $blog = blog::paginate(6);

     return view("client.blog.blog",["blogs"=>$blog]);
 }
 public function  JsonBlog(){
     $data = blog::search()->get();
     return $data;
 }
 public  function getBlogDetail(Request $request){
    $id= $request->id;

    $blog = blog::find($id);

     $blog->created= \Carbon\Carbon::now()->format("d-m-Y");

     return view("client.blog.blog_detail",["blog"=>$blog]);

 }
}
