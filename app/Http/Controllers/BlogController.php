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
    public function getAdminBlogForm(){
        return view("admin.blog.addblogs");
    }
    public function addBlog(Request $request){
        $blog = new Blog();
$blog->title = $request->title;
$blog->description = $request->description;
$blog->author =  $request->author;
$blog->image = $request->thumbnail;
$blog->details= $request->detail;
$blog->timestamps = false;
        $blog->save();
        return redirect('admin/blog/create')->with("msg", "Thêm thành công");

    }
    public function getAdminBlogList(){
        $blogs = Blog::all();
        return view("admin.blog.listblog",["blogs"=>$blogs]);
    }
    public function deleteBlog(Request $request){
        $blog = Blog::find($request->id);
        $blog->delete();
        return redirect('admin/blog/list')->with("msg", "Xóa thành công");
    }

}
